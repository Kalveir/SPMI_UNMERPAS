<?php

namespace App\Http\Controllers;
use App\Models\pengisian;
// use App\Models\standard;
use App\Models\indikator;
use App\Models\prodi;
use App\Models\pengisian_berkas;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class PengendalianController extends Controller
{
    public function PengendalianInformatika()
    {
        $berkas_prodi = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',1)->where('aksi_code','>',1)->orderBy('id', 'desc')->get();
        $indikator = indikator::get();
        $prodi = Prodi::find(1);
        return view('admin.berkas.pengendalian', compact('berkas_prodi','indikator','prodi'));
    }
    public function PengendalianRPL()
    {
        $berkas_prodi = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',2)->where('aksi_code','>',1)->orderBy('id', 'desc')->get();
        $indikator = indikator::get();
        $prodi = Prodi::find(2);
        return view('admin.berkas.pengendalian', compact('berkas_prodi','indikator','prodi'));
    }
    public function PengendalianManajemen()
    {
        $berkas_prodi = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',3)->where('aksi_code','>',1)->orderBy('id', 'desc')->get();
        $indikator = indikator::get();
        $prodi = Prodi::find(3);
        return view('admin.berkas.pengendalian', compact('berkas_prodi','indikator','prodi'));
    }
    public function PengendalianHukum()
    {
        $berkas_prodi = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',4)->where('aksi_code','>',1)->orderBy('id', 'desc')->get();
        $indikator = indikator::get();
        $prodi = Prodi::find(4);
        return view('admin.berkas.pengendalian', compact('berkas_prodi','indikator','prodi'));
    }
    public function PengendalianAgroteknologi()
    {
        $berkas_prodi = Pengisian::with(['pegawai', 'auditor'])->where('program_studi',5)->where('aksi_code','>',1)->orderBy('id', 'desc')->get();
        $indikator = indikator::get();
        $prodi = Prodi::find(5);
        return view('admin.berkas.pengendalian', compact('berkas_prodi','indikator','prodi'));
    }

    public function addPengendalian($id)
    {
        $indikator = Indikator::get();
        $pengendalian = pengisian::find($id);
        return view('admin.berkas.tambah_pengendalian',compact('pengendalian', 'indikator'));

    }

    public function updatePengendalian(Request $request,$id)
    {
        $pengisian = Pengisian::find($id);
        $pengendalian = Pengisian_berkas::where('pengisian_id', $id)->where('jenis', 'Pengendalian')->first();

        if ($pengendalian) {
            $pengendalian->deskripsi = $request->deskripsi;
        } else {
            $pengendalian = new Pengisian_berkas;
            $pengendalian->jenis = 'Pengendalian';
            $pengendalian->pengisian_id = $pengisian->id;
            $pengendalian->pegawai_id = $pengisian->pegawai_id;
            $pengendalian->deskripsi = $request->deskripsi;
            $pengendalian->program_studi_id = $pengisian->program_studi;
            $pengendalian->indikator_id = $pengisian->indikator_id;
        }
        $pengendalian->save();

        if ($pengisian->program_studi == 1) {
            $redirectRoute = 'prodi_informatika.index';
        } elseif ($pengisian->program_studi == 2) {
            $redirectRoute = 'prodi_rpl.index';
        }elseif ($pengisian->program_studi == 3) {
            $redirectRoute = 'prodi_manajemen.index';
        }elseif ($pengisian->program_studi == 4) {
            $redirectRoute = 'prodi_hukum.index';
        }elseif ($pengisian->program_studi == 5) {
            $redirectRoute = 'prodi_agro.index';
        }
        $pengisian->save();
        Alert::success('Sukses', 'Data Pengendalian Ditambahkan');
        return redirect()->route($redirectRoute);

    }

    public function validasiPengendalian($id)
    {
        $pengisian = Pengisian::find($id);
        $pengisian->aksi_code = 3;
        $pengisian->save();
        Alert::success('Sukses', 'Data Pengendalian Tersimpan');
        return redirect()->back();


    }
}