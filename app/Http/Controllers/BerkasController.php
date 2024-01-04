<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengisian;
use App\Models\standard;
use App\Models\indikator;
use App\Models\pengisian_berkas;
use Illuminate\Support\Facades\Auth;

class BerkasController extends Controller
{
    public function listBerkas()
    {
        $indikator = Indikator::get();
        // $indikator = Indikator::where('pegawai_id', Auth::user()->id)->get();
        $berkas = Pengisian::where('pegawai_id', Auth::user()->id)->get();
        return view('admin.berkas.list_berkas', compact('berkas','indikator'));
    }

    public function addIndikator(Request $request)
    {
        Pengisian::updateOrCreate(
            [
                'pegawai_id' => Auth::user()->id,
                'program_studi' => Auth::user()->prodi_id,
                'indikator_id' => $request->indikator_id,
                'nilai' => 0,
                'tahun' => now()->format('Y'),
                'aksi_code'=> 0,
            ]
        );
        return redirect()->route('berkas.index');
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
        return redirect()->route('berkas.index');
    }

    public function addFile($id)
    {
        $pengisian = Pengisian::find($id);
        return view('admin.berkas.tambah_berkas', compact('pengisian'));
    }

    public function uploadFile(Request $request, $id)
    {
        $pengisian = Pengisian::find($id);
        $file = $request->file('nama_file');
        foreach($file as $fl){
            $original = $fl->getClientOriginalName();
            $nama_file = now()->format('dmY').'_'.$original;

            $pengisian_berkas = new pengisian_berkas;
            $pengisian_berkas->nama_file = $nama_file;
            $fl->storeAs('Berkas',$nama_file);

            $pengisian_berkas->jenis = $request->jenis;
            $pengisian_berkas->pengisian_id = $pengisian->id;
            $pengisian_berkas->pegawai_id = Auth::user()->id;
            $pengisian_berkas->deskripsi = $request->deskripsi;
            $pengisian_berkas->program_studi_id =  Auth::user()->prodi_id;
            $pengisian_berkas->indikator_id =  $pengisian->indikator_id;
            $pengisian_berkas->save();
        }
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
        return redirect()->route('berkas.index');

    }

    public function validasiBerkas($id)
    {
        $berkas = Pengisian::find($id);
        $berkas->aksi_code = 1;
        $berkas->save();
        return redirect()->route('berkas.index');
    }
}
