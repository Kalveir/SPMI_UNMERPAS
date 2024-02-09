<?php

namespace App\Http\Controllers;

use App\Models\bobot_nilai;
use App\Models\pengisian;
// use App\Models\standard;
use App\Models\indikator;
use App\Models\nilai;
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
        $prodi = 'Informatika';
        return view('admin.berkas.penilaian', compact('berkas_nilai', 'indikator', 'prodi'));
    }
    public function PenilaianRPL()
    {
        $tahun = date("Y");
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi', 2)->where('aksi_code', '>', 0)->where('tahun', $tahun)->get();
        $indikator = indikator::get();
        $prodi = 'Rekayasa Perangkat Lunak';
        return view('admin.berkas.penilaian', compact('berkas_nilai', 'indikator', 'prodi'));
    }
    public function PenilaianManajemen()
    {
        $tahun = date("Y");
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi', 3)->where('aksi_code', '>', 0)->where('tahun', $tahun)->get();
        $indikator = indikator::get();
        $prodi = 'Manajemen';
        return view('admin.berkas.penilaian', compact('berkas_nilai', 'indikator', 'prodi'));
    }
    public function PenilaianHukum()
    {
        $tahun = date("Y");
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi', 4)->where('aksi_code', '>', 0)->where('tahun', $tahun)->get();
        $indikator = indikator::get();
        $prodi = 'Hukum';
        return view('admin.berkas.penilaian', compact('berkas_nilai', 'indikator', 'prodi'));
    }
    public function PenilaianAgroteknologi()
    {
        $tahun = date("Y");
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi', 5)->where('aksi_code', '>', 0)->where('tahun', $tahun)->get();
        $indikator = indikator::get();
        $prodi = 'Agroteknologi';
        return view('admin.berkas.penilaian', compact('berkas_nilai', 'indikator', 'prodi'));
    }

    public function addNilai($id)
    {
        $pengisian = Pengisian::find($id);
        $nilai = Nilai::where('indikator_id',$pengisian->indikator_id)->orderBy('nilai', 'desc')->get();
        if ($pengisian->aksi_code == 1) {
            return view('admin.berkas.tambah_nilai', compact('pengisian', 'nilai'));
        } else {
            Alert::error('Gagal', 'Tindakan Ditolak');
            return back();
        }
    }
    public function updateNilai(Request $request, $id)
    {
        $pengisian = Pengisian::find($id);

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
        $pengisian = Pengisian::find($id);
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
