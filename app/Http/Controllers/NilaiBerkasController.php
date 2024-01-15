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
    public function PenilaianInformatika()
    {
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',1)->get();
        $indikator = indikator::get();
        return view('admin.berkas.penilaian', compact('berkas_nilai','indikator'));
    }
    public function PenilaianRPL()
    {
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',2)->get();
        $indikator = indikator::get();
        return view('admin.berkas.penilaian', compact('berkas_nilai','indikator'));
    }
    public function PenilaianManajemen()
    {
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',3)->get();
        $indikator = indikator::get();
        return view('admin.berkas.penilaian', compact('berkas_nilai','indikator'));
    }
    public function PenilaianHukum()
    {
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',4)->get();
        $indikator = indikator::get();
        return view('admin.berkas.penilaian', compact('berkas_nilai','indikator'));
    }
    public function PenilaianAgroteknologi()
    {
        $berkas_nilai = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',5)->get();
        $indikator = indikator::get();
        return view('admin.berkas.penilaian', compact('berkas_nilai','indikator'));
    }

    public function addNilai($id)
    {
        $pengisian = Pengisian::find($id);
        return view('admin.berkas.tambah_nilai', compact('pengisian'));
    }
    public function updateNilai(Request $request, $id)
    {
        $pengisian = Pengisian::find($id);
        $indikator_nilai = Nilai::where('id', $pengisian->indikator_id)->first();
        $penilaian = $indikator_nilai->nilai - $request->nilai;

        $pengisian->nilai = $penilaian;
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
