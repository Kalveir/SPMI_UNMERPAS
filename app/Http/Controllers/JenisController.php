<?php

namespace App\Http\Controllers;

use App\Models\jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = Jenis::get();
        return view('admin.jenis', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jenis = new Jenis;
        $jenis->nama = $request->nama;
        $jenis->status = $request->status;
        $jenis->save();
        return redirect()->route('jenis.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $jenis)
    {
        $jenis = Jenis::find($jenis);
        $jenis->nama = $request->nama;
        $jenis->status = $request->status;
        $jenis->save();
        return redirect()->route('jenis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($jenis)
    {
        $jenis = Jenis::find($jenis);
        $jenis->delete();
        return redirect()->route('jenis.index');
    }
}
