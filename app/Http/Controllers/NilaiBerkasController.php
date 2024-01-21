<?php

namespace App\Http\Controllers;
use App\Models\pengisian;
// use App\Models\standard;
use App\Models\indikator;
use App\Models\nilai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NilaiBerkasController extends Controller
{
    // tolong tambahkan tahun sekarang
    public function PenilaianInformatika()
    {
        $tahun = date("Y");
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',1)->where('aksi_code','>',0)->where('tahun',$tahun)->get();
        $indikator = indikator::get();
        $prodi = 'Informatika';
        return view('admin.berkas.penilaian', compact('berkas_nilai','indikator','prodi'));
    }
    public function PenilaianRPL()
    {
        $tahun = date("Y");
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',2)->where('aksi_code','>',0)->where('tahun',$tahun)->get();
        $indikator = indikator::get();
        $prodi = 'Rekayasa Perangkat Lunak';
        return view('admin.berkas.penilaian', compact('berkas_nilai','indikator','prodi'));
    }
    public function PenilaianManajemen()
    {
        $tahun = date("Y");
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',3)->where('aksi_code','>',0)->where('tahun',$tahun)->get();
        $indikator = indikator::get();
        $prodi = 'Manajemen';
        return view('admin.berkas.penilaian', compact('berkas_nilai','indikator','prodi'));
    }
    public function PenilaianHukum()
    {
        $tahun = date("Y");
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',4)->where('aksi_code','>',0)->where('tahun',$tahun)->get();
        $indikator = indikator::get();
        $prodi = 'Hukum';
        return view('admin.berkas.penilaian', compact('berkas_nilai','indikator','prodi'));
    }
    public function PenilaianAgroteknologi()
    {
        $tahun = date("Y");
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',5)->where('aksi_code','>',0)->where('tahun',$tahun)->get();
        $indikator = indikator::get();
        $prodi = 'Agroteknologi';
        return view('admin.berkas.penilaian', compact('berkas_nilai','indikator','prodi'));
    }

    public function addNilai($id)
    {
        $pengisian = Pengisian::find($id);
        return view('admin.berkas.tambah_nilai', compact('pengisian'));
    }
    public function updateNilai(Request $request, $id)
    {
        $pengisian = Pengisian::find($id);
        // $indikator_nilai = Nilai::where('id', $pengisian->indikator_id)->first();

        $pengisian->nilai = $request->nilai;
        $pengisian->komentar = $request->komentar;
        $pengisian->audhitor = Auth::user()->id;
        $pengisian->aksi_code = 2;

        if ($pengisian->program_studi == 1) {
            $redirectRoute = 'informatika.index';
        } elseif ($pengisian->program_studi == 2) {
            $redirectRoute = 'rpl.index';
        }elseif ($pengisian->program_studi == 3) {
            $redirectRoute = 'manajemen.index';
        }elseif ($pengisian->program_studi == 4) {
            $redirectRoute = 'hukum.index';
        }elseif ($pengisian->program_studi == 5) {
            $redirectRoute = 'agro.index';
        }
        

        $pengisian->save();
        return redirect()->route($redirectRoute);


    }
}
