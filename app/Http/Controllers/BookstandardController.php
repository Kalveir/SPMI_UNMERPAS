<?php

namespace App\Http\Controllers;

use App\Models\bookstandar;
use App\Models\standard;
use App\Models\jenis;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class BookstandardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $bookstandar = Bookstandar::where('pegawai_id', Auth::user()->id)->get();
        $bookstandar = Bookstandar::get();
        return view('admin.book.bookstandard.bukustandard',compact('bookstandar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $standard = Standard::where('status',1)->get();
        $jenis = Jenis::get();
        return view('admin.book.bookstandard.tambah_bookstandard', compact('standard', 'jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bookstandar = new Bookstandar;
        $bookstandar->pegawai_id = Auth::user()->id;
        $bookstandar->standard_id = $request->standar_id;
        $bookstandar->visi_misi = $request->visi_misi;
        $bookstandar->tujuan = $request->tujuan;
        $bookstandar->rasional = $request->rasional;
        $bookstandar->subjek = $request->subjek;
        $bookstandar->definisi_istilah = $request->definisi_istilah;
        $bookstandar->status = $request->status;
        $bookstandar->save();
        Alert::success('Sukses', 'Buku Standar Disimpan');
        return redirect()->route('bookstandard.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($bookstandar)
    {
        $bookstandar = Bookstandar::find($bookstandar);
        $standard = Standard::get();
        return view('admin.book.bookstandard.show_bookstandard',compact('bookstandar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($bookstandar)
    {
        $bookstandar = Bookstandar::find($bookstandar);
        $standard = Standard::where('status',1)->get();
        $this->authorize('aksesbookStandard',$bookstandar);
        return view('admin.book.bookstandard.edit_bookstandard', compact('bookstandar','standard')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $bookstandar)
    {
        $bookstandar = Bookstandar::find($bookstandar);
        // $bookstandar->pegawai_id = Auth::user()->id;
        $bookstandar->standard_id = $request->standar_id;
        $bookstandar->visi_misi = $request->visi_misi;
        $bookstandar->tujuan = $request->tujuan;
        $bookstandar->rasional = $request->rasional;
        $bookstandar->subjek = $request->subjek;
        $bookstandar->definisi_istilah = $request->definisi_istilah;
        $bookstandar->status = $request->status;
        $bookstandar->save();
        Alert::success('Sukses', 'Buku Standar Diperbarui');
        return redirect()->route('bookstandard.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($bookstandar)
    {
        $bookstandar = Bookstandar::find($bookstandar);
        $bookstandar->delete();
        Alert::success('Sukses', 'Buku Standar Dihapus');
        return redirect()->route('bookstandard.index');
    }
}
