<?php

namespace App\Http\Controllers;

use App\Models\standard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StandardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $standar = Standard::where('pegawai_id', Auth::user()->id)->get();
        $standar = Standard::get();
        return view('admin.standar', compact('standar'));
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
        $standar = new Standard;
        $standar->pegawai_id = Auth::user()->id;
        $standar->nama = $request->nama;
        $standar->status = $request->status;
        $standar->save();

        Alert::success('Sukses', 'Data berhasil masuk');
        return redirect()->route('standard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(standard $standard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(standard $standard)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $standard)
    {
        $standar = Standard::find($standard);
        $standar->nama = $request->nama;
        $standar->status = $request->status;
        $standar->save();
        return redirect()->route('standard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($standard)
    {
        $standar = Standard::find($standard);
        $standar->delete();
        return redirect()->route('standard.index');
    }
}
