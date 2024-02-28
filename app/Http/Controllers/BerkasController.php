<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengisian;
use App\Models\standard;
use App\Models\indikator;
use App\Models\pengisian_berkas;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class BerkasController extends Controller
{
    public function listBerkas()
    {
        $standar = Standard::get();
        // $berkas = Pengisian::where('pegawai_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $berkas = Pengisian::where('program_studi', Auth::user()->prodi_id)->orderBy('id', 'desc')->get();
        return view('admin.berkas.list_berkas', compact('berkas','standar'));
        // $berkas = Pengisian::with(['pegawai', 'auditor'])->where('pegawai_id', Auth::user()->id)->get();
    }

    public function addIndikator(Request $request)
    {
        $cari_indikator = Indikator::where('standard_id', $request->standar_id)->get();

            if($cari_indikator->isEmpty()) {
                Alert::error('Gagal', 'Standar tidak memiliki indikator');
                return redirect()->route('berkas.index');
            }

            // Melakukan pengecekan dan pengisian untuk setiap indikator
            $berhasil_ditambahkan = false; // Menyimpan status apakah ada indikator yang berhasil ditambahkan
            foreach($cari_indikator as $indikator) {
                $cek_pengisian = Pengisian::where('pegawai_id', Auth::user()->id)
                    ->where('indikator_id', $indikator->id)
                    ->where('tahun', now()->format('Y'))->first();

                if (!$cek_pengisian) {
                    $pengisian = new Pengisian;
                    $pengisian->pegawai_id = Auth::user()->id;
                    $pengisian->program_studi = Auth::user()->prodi_id;
                    $pengisian->indikator_id = $indikator->id;
                    $pengisian->tahun = now()->format('Y');
                    $pengisian->aksi_code = 0;
                    $pengisian->save();

                    $berhasil_ditambahkan = true;
                }
            }

            if($berhasil_ditambahkan) {
                Alert::success('Sukses', 'Indikator Berhasil Ditambahkan');
            } else {
                Alert::error('Gagal', 'Semua indikator sudah terdaftar');
            }

            return redirect()->route('berkas.index');

        Alert::error('Gagal', 'Tidak ada indikator yang bisa ditambahkan');
        return redirect()->back();
    }

    public function hapusIndikator($id)
    {
        $pengisian =  Pengisian::find($id);
        $pengisian_berkas = Pengisian_berkas::where('pengisian_id', $pengisian->id)->get();
        foreach ($pengisian_berkas as $hapus_berkas) 
        {
            $filepath = public_path('storage/Berkas/' . $hapus_berkas->nama_file);
            if (file_exists($filepath)) {
                unlink($filepath);
            }
            $hapus_berkas->delete();
        }
        $pengisian->delete();
        Alert::success('Sukses', 'Indikator Berhasil Dihapus');
        return redirect()->route('berkas.index');
    }

    public function addFile($id)
    {
        $pengisian = Pengisian::find($id);
        return view('admin.berkas.tambah_berkas', compact('pengisian'));
    }

    public function addPeningkatan($id)
    {
        $pengisian = Pengisian::find($id);
        return view('admin.berkas.tambah_peningkatan',compact('pengisian'));
    }

    public function uploadFile(Request $request, $id)
    {
        $pengisian = Pengisian::find($id);
        $lastId = Pengisian_berkas::max('id') + 1;
        $file = $request->file('nama_file');
        foreach($file as $fl){
            $original = $fl->getClientOriginalName();
            $extension = $fl->getClientOriginalExtension();
            $hashName = md5($original . now()->format('dmY') . uniqid()) . '.' . $extension;
        
            $pengisian_berkas = new Pengisian_berkas;
            $pengisian_berkas->nama_file = $hashName;
            $fl->storeAs('Berkas', $hashName);

            $pengisian_berkas->jenis = $request->jenis;
            $pengisian_berkas->pengisian_id = $pengisian->id;
            $pengisian_berkas->pegawai_id = Auth::user()->id;
            $pengisian_berkas->deskripsi = $request->deskripsi;
            $pengisian_berkas->program_studi_id =  Auth::user()->prodi_id;
            $pengisian_berkas->indikator_id =  $pengisian->indikator_id;
            $pengisian_berkas->save();
        }
        Alert::success('Sukses', 'Data Berkas Berhasil Ditambahkan');
        return redirect()->route('berkas.index');
    }

    public function uploadPeningkatan(Request $request, $id)
    {
        $pengisian = Pengisian::find($id);
        $file = $request->file('nama_file');
        // $lastId = Pengisian_berkas::max('id') + 1;
        foreach ($file as $fl) {
            $original = $fl->getClientOriginalName();
            $extension = $fl->getClientOriginalExtension();
            
            // Menggunakan md5 untuk menghasilkan hashname yang pendek
            $hashName = md5($original . now() . uniqid()) . '.' . $extension;
        
            $pengisian_berkas = new Pengisian_berkas;
            $pengisian_berkas->nama_file = $hashName;
            $fl->storeAs('Berkas', $hashName);

            $pengisian_berkas->jenis = 'Peningkatan';
            $pengisian_berkas->pengisian_id = $pengisian->id;
            $pengisian_berkas->pegawai_id = Auth::user()->id;
            $pengisian_berkas->deskripsi = $request->deskripsi;
            $pengisian_berkas->program_studi_id =  Auth::user()->prodi_id;
            $pengisian_berkas->indikator_id =  $pengisian->indikator_id;
            $pengisian_berkas->save();
        }
        Alert::success('Sukses', 'Data Peningkatan Ditambahkan');
        return redirect()->route('berkas.index');
    }

    public function deleteFile($id)
    {
        $pengisian_berkas = Pengisian_berkas::find($id);
        $filepath = public_path('storage/Berkas/' . $pengisian_berkas->nama_file);
        if (file_exists($filepath)){
            unlink($filepath);
        }
        $pengisian_berkas->delete();
        Alert::success('Sukses', 'File Berkas Dihapus');
        return redirect()->route('berkas.index');

    }

    public function validasiBerkas($id)
    {
        $berkas = Pengisian::find($id);
        $berkas->aksi_code = 1;
        $berkas->save();
        Alert::success('Sukses', 'Data berhasil Disimpan');
        return redirect()->route('berkas.index');
    }
    public function submitpeningkatan($id)
    {
        $berkas = Pengisian::find($id);
        $berkas->tanggal = now()->format('d/m/Y');
        $berkas->aksi_code = 4;
        $berkas->save();
        Alert::success('Sukses', 'Data Peningkatan Disimpan');
        return redirect()->route('berkas.index');
    }
}
