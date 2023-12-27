<?php

namespace App\Http\Controllers;

use App\Models\bookmanual;
use App\Models\jenis;
use App\Models\standard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmanualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookmanual = Bookmanual::where('pegawai_id', Auth::user()->id)->get();
        return view('admin.book.bookmanual.bukumanual',compact('bookmanual'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $standard = Standard::where('pegawai_id', Auth::user()->id)->get();
        $jenis = Jenis::get();
        return view('admin.book.bookmanual.tambah_bookmanual', compact('standard','jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bookmanual = new Bookmanual;
        $bookmanual->pegawai_id = Auth::user()->id;
        $bookmanual->ruanglingkup = $request->ruanglingkup;
        $bookmanual->standard_id = $request->standar_id;
        $bookmanual->jenis = $request->jenis;
        $bookmanual->visi_misi = $request->visi_misi;
        $bookmanual->tujuan = $request->tujuan;
        $bookmanual->definisi_istilah = $request->definisi_istilah;
        $bookmanual->tahapan = $request->tahapan;
        $bookmanual->status = $request->status;
        $bookmanual->save();
         
        return redirect()->route('bookmanual.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(bookmanual $bookmanual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($bookmanual)
    {
        $bookmanual = Bookmanual::find($bookmanual);
        $standard = Standard::where('pegawai_id', Auth::user()->id)->get();
        $this->authorize('aksesbookManual',$bookmanual);
        return view('admin.book.bookmanual.edit_bookmanual', compact('bookmanual','standard')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $bookmanual)
    {
        $bookmanual = Bookmanual::find($bookmanual);
        // $bookmanual->pegawai_id = Auth::user()->id;
        $bookmanual->ruanglingkup = $request->ruanglingkup;
        $bookmanual->standard_id = $request->standar_id;
        $bookmanual->jenis = $request->jenis;
        $bookmanual->visi_misi = $request->visi_misi;
        $bookmanual->tujuan = $request->tujuan;
        $bookmanual->definisi_istilah = $request->definisi_istilah;
        $bookmanual->tahapan = $request->tahapan;
        $bookmanual->status = $request->status;
        $bookmanual->save();
         
        return redirect()->route('bookmanual.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($bookmanual)
    {
        $bookmanual = Bookmanual::find($bookmanual);
        $bookmanual->delete();
        return redirect()->route('bookmanual.index');
    }
}
