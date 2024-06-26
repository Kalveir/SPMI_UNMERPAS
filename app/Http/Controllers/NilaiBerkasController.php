<?php

namespace App\Http\Controllers;

use App\Models\bobot_nilai;
use App\Models\pengisian;
// use App\Models\standard;
use App\Models\indikator;
use App\Models\nilai;
use App\Models\prodi;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NilaiBerkasController extends Controller
{
    public function PenilaianInformatika()
    {
        $tahun = date("Y");
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi', 1)->where('aksi_code', '>', 0)->where('tahun', $tahun)->get();
        $indikator = indikator::get();
        $prodi = Prodi::find(1);
        return view('admin.berkas.penilaian', compact('berkas_nilai', 'indikator', 'prodi'));
    }
    public function PenilaianRPL()
    {
        $tahun = date("Y");
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi', 2)->where('aksi_code', '>', 0)->where('tahun', $tahun)->get();
        $indikator = indikator::get();
        $prodi = Prodi::find(2);
        return view('admin.berkas.penilaian', compact('berkas_nilai', 'indikator', 'prodi'));
    }
    public function PenilaianManajemen()
    {
        $tahun = date("Y");
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi', 3)->where('aksi_code', '>', 0)->where('tahun', $tahun)->get();
        $indikator = indikator::get();
        $prodi = Prodi::find(3);
        return view('admin.berkas.penilaian', compact('berkas_nilai', 'indikator', 'prodi'));
    }
    public function PenilaianHukum()
    {
        $tahun = date("Y");
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi', 4)->where('aksi_code', '>', 0)->where('tahun', $tahun)->get();
        $indikator = indikator::get();
        $prodi = Prodi::find(4);
        return view('admin.berkas.penilaian', compact('berkas_nilai', 'indikator', 'prodi'));
    }
    public function PenilaianAgroteknologi()
    {
        $tahun = date("Y");
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi', 5)->where('aksi_code', '>', 0)->where('tahun', $tahun)->get();
        $indikator = indikator::get();
        $prodi = Prodi::find(5);
        return view('admin.berkas.penilaian', compact('berkas_nilai', 'indikator', 'prodi'));
    }

    public function addNilai($id)
    {
        $dc = decrypt($id);
        $pengisian = Pengisian::find($dc);
        $nilai = Nilai::where('indikator_id',$pengisian->indikator_id)->where('status',1)->orderBy('nilai', 'desc')->get();
        if ($pengisian->aksi_code == 1) {
            return view('admin.berkas.tambah_nilai', compact('pengisian', 'nilai'));
        } else {
            Alert::error('Gagal', 'Tindakan Ditolak');
            return back();
        }
    }
    public function updateNilai(Request $request, $id)
    {
        $dc = decrypt($id);
        $pengisian = Pengisian::find($dc);

        $pengisian->nilai = $request->nilai;
        $pengisian->komentar = $request->komentar;
        $pengisian->audhitor = Auth::user()->id;


        if ($pengisian->program_studi == 1) {
            $redirectRoute = 'informatika.index';
        } elseif ($pengisian->program_studi == 2) {
            $redirectRoute = 'rpl.index';
        } elseif ($pengisian->program_studi == 3) {
            $redirectRoute = 'manajemen.index';
        } elseif ($pengisian->program_studi == 4) {
            $redirectRoute = 'hukum.index';
        } elseif ($pengisian->program_studi == 5) {
            $redirectRoute = 'agro.index';
        }


        $pengisian->save();
        Alert::success('Sukses', 'Penilaian Berhasil Ditambahkan');
        return redirect()->route($redirectRoute);
    }

    public function validasiEvaluasi($id)
    {
        $dc = decrypt($id);
        $pengisian = Pengisian::find($dc);
        if($pengisian->audhitor == Auth::user()->id)
        {
            $indikator_nilai = Bobot_nilai::where('indikator_id', $pengisian->indikator_id)->first();
            if($indikator_nilai){
                $hasil_nilai =  $pengisian->nilai * $indikator_nilai->bobot;
                $pengisian->nilai = $hasil_nilai;
                $pengisian->aksi_code = 2;
                $pengisian->save();
                    Alert::success('Sukses', 'Penilaian Evaluasi Tersimpan');
            }else{
                Alert::error('Gagal', 'Indikator ini tidak memiliki bobot nilai'); 
            }
        }else
        {
            Alert::error('Gagal', 'Akses Ditolak'); 
        }

        if ($pengisian->program_studi == 1) {
            $redirectRoute = 'informatika.index';
        } elseif ($pengisian->program_studi == 2) {
            $redirectRoute = 'rpl.index';
        } elseif ($pengisian->program_studi == 3) {
            $redirectRoute = 'manajemen.index';
        } elseif ($pengisian->program_studi == 4) {
            $redirectRoute = 'hukum.index';
        } elseif ($pengisian->program_studi == 5) {
            $redirectRoute = 'agro.index';
        }
        return redirect()->route($redirectRoute);
    }
}
