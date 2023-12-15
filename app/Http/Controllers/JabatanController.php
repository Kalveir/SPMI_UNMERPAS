<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = Jabatan::get();
        return view('admin.jabatan',compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jabatan = new Jabatan;
        $jabatan->nama = $request->nama;
        $jabatan->save();
        return redirect()->route('jabatan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $jabatan)
    {
        $jabatan = Jabatan::find($jabatan);
        $jabatan->nama = $request->nama;
        $jabatan->save();
        return redirect()->route('jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($jabatan)
    {
        $jabatan = Jabatan::find($jabatan);
        $jabatan->delete();
        return redirect()->route('jabatan.index'); 
    }
}
