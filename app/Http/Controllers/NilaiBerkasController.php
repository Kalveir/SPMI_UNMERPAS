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
        $berkas = Pengisian::where('program_studi',1)->get();
        $indikator = indikator::get();
        return view('admin.berkas.penilaian', compact('berkas','indikator'));
    }
    public function PenilaianRPL()
    {
        $berkas = Pengisian::where('program_studi',2)->get();
        $indikator = indikator::get();
        return view('admin.berkas.penilaian', compact('berkas','indikator'));
    }
    public function PenilaianManajemen()
    {
        $berkas = Pengisian::where('program_studi',3)->get();
        $indikator = indikator::get();
        return view('admin.berkas.penilaian', compact('berkas','indikator'));
    }
    public function PenilaianHukum()
    {
        $berkas = Pengisian::where('program_studi',4)->get();
        $indikator = indikator::get();
        return view('admin.berkas.penilaian', compact('berkas','indikator'));
    }
    public function PenilaianArgoteknologi()
    {
        $berkas = Pengisian::where('program_studi',5)->get();
        $indikator = indikator::get();
        return view('admin.berkas.penilaian', compact('berkas','indikator'));
    }

    public function addNilai($id)
    {
        $pengisian = Pengisian::find($id);
        return view('admin.berkas.tambah_nilai', compact('pengisian'));
    }
    public function updateNilai(Request $request, $id)
    {
        $pengisian = Pengisian::find($id);
        $indikator_nilai = nilai::where('id',$pengisian->indikator_id)->first();
        $penilaian = $indikator_nilai->nilai*$request->nilai;
        $pengisian->nilai = $penilaian;
        $pengisian->komentar = $request->komentar;
        $pengisian->aksi_code = 2;
        $pengisian->save();

        return redirect()->back();
    }
}
