<?php

namespace App\Http\Controllers;

use App\Models\nilai;
use Illuminate\Support\Facades\Auth;
use App\Models\indikator;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilai = Nilai::get();
        return view('admin.nilai.nilai',compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $indikator = Indikator::get();
        //$indikator = Indikator::where('pegawai_id', Auth::user()->id)->get();
        return view('admin.nilai.tambah_nilai', compact('indikator'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nilai = new Nilai;
        $nilai->deskripsi = $request->deskripsi;
        $nilai->indikator_id = $request->indikator_id;
        $nilai->nilai = $request->nilai;
        $nilai->status = $request->status;
        $nilai->save();

        return redirect()->route('nilai.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nilai)
    {
        $nilai = Nilai::find($nilai);
        $indikator = Indikator::where('pegawai_id', Auth::user()->id)->get();
        return view('admin.nilai.edit_nilai', compact('nilai', 'indikator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nilai)
    {
        $nilai = Nilai::find($nilai);
        $nilai->deskripsi = $request->deskripsi;
        $nilai->indikator_id = $request->indikator_id;
        $nilai->nilai = $request->nilai;
        $nilai->status = $request->status;
        $nilai->save();

        return redirect()->route('nilai.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nilai)
    {
        $nilai = Nilai::find($nilai);
        $nilai->delete();
        return redirect()->route('nilai.index');
    }
}
