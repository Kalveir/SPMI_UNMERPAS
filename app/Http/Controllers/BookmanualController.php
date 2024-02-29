<?php

namespace App\Http\Controllers;

use App\Models\bookmanual;
use App\Models\jenis;
use App\Models\standard;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class BookmanualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookmanual = Bookmanual::get();
        return view('admin.book.bookmanual.bukumanual',compact('bookmanual'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $standard = Standard::where('status',1)->get();
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
        Alert::success('Sukses', 'Buku Manual Disimpan');
        return redirect()->route('bookmanual.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($bookmanual)
    {
        $bookmanual = Bookmanual::find($bookmanual);
        $standard = Standard::get();
        return view('admin.book.bookmanual.show_bookmanual',compact('bookmanual','standard'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($bookmanual)
    {
        $bookmanual = Bookmanual::find($bookmanual);
        $standard = Standard::where('status',1)->get();
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
        Alert::success('Sukses', 'Buku Manual Diperbarui');
        return redirect()->route('bookmanual.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($bookmanual)
    {
        $bookmanual = Bookmanual::find($bookmanual);
        $bookmanual->delete();
        Alert::success('Sukses', 'Buku Manual Dihapus');
        return redirect()->route('bookmanual.index');
    }
}
