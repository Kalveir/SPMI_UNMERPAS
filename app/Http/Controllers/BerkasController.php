<?php

namespace App\Http\Controllers;

use App\Models\pengisian;
use App\Models\standard;
use App\Models\indikator;
use App\Models\pengisian_berkas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berkas = pengisian::where('pegawai_id', Auth::user()->id)->get();
        return view('admin.berkas.list_berkas', compact('berkas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $indikator = indikator::where('pegawai_id', Auth::user()->id)->get();
        return view('admin.berkas.tambah_berkas', compact('indikator'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengisian =  new Pengisian;
        $pengisian->pegawai_id = Auth::user()->id;
        $pengisian->program_studi =  Auth::user()->prodi_id;
        $pengisian->indikator_id =  $request->indikator_id;
        $pengisian->nilai = 0;
        
        $penetapan = $request->file('penetapan');
        foreach($penetapan as $pnt){
            $original = $pnt->getClientOriginalName();
            $pengisian_berkas = new pengisian_berkas;

            $pengisian_berkas->nama_file = $original;
            $pnt->storeAs('Berkas',$original);

            $pengisian_berkas->jenis = 'Penetapan';
            $pengisian_berkas->pengisian_id = $pengisian->id;;
            $pengisian_berkas->pegawai_id = Auth::user()->id;
            $pengisian_berkas->program_studi_id =  Auth::user()->prodi_id;
            $pengisian_berkas->indikator_id =  $request->indikator_id;
            $pengisian_berkas->save();
        }

        $pengisian->save();

        return redirect()->route('berkas.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
