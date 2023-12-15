<?php

namespace App\Http\Controllers;

use App\Models\bookdocs;
use App\Models\jenis;
use App\Models\standard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BookdocsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookdocs = Bookdocs::get();
        return view('admin.book.bookdocs.bookdocs', compact('bookdocs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $standard = Standard::where('pegawai_id', Auth::user()->id)->get();
        return view('admin.book.bookdocs.tambah_bookdocs',compact('standard'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bookdocs = new Bookdocs;
        $file = $request->file('nama_file')->store('SOP');
        $name_file =  $request->file('nama_file')->hashName();
        $bookdocs->nama = $request->nama;
        $bookdocs->jenis = $request->jenis;
        $bookdocs->standard_id = $request->standar_id;
        $bookdocs->nama_file = $name_file;
        $bookdocs->save();

        return redirect()->route('bookdocs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(bookdocs $bookdocs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($bookdocs)
    {
        $bookdocs = Bookdocs::find($bookdocs);
        $standard = Standard::where('pegawai_id', Auth::user()->id)->get();
        return view('admin.book.bookdocs.edit_bookdocs', compact('bookdocs','standard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $bookdocs)
    {
        $bookdocs = Bookdocs::find($bookdocs);
        if (!empty($request->nama_file )){
            $filepath = public_path('storage/SOP/' . $bookdocs->nama_file);
            if (file_exists($filepath)){
                unlink($filepath);
            }
            $bookdocs->nama = $request->nama;
            $bookdocs->jenis = $request->jenis;
            $bookdocs->standard_id = $request->standar_id;
            $file = $request->file('nama_file')->store('SOP');
            $name_file =  $request->file('nama_file')->hashName();
            $bookdocs->nama_file = $name_file;
            $bookdocs->save();
            return redirect()->route('bookdocs.index');

        }else{
            $bookdocs->nama = $request->nama;
            $bookdocs->jenis = $request->jenis;
            $bookdocs->standard_id = $request->standar_id;
            $bookdocs->save();
            return redirect()->route('bookdocs.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($bookdocs)
    {
        $bookdocs = Bookdocs::find($bookdocs);
        $filepath = public_path('storage/SOP/' . $bookdocs->nama_file);
        if (file_exists($filepath)){
            unlink($filepath);
        }
        $bookdocs->delete();
        return redirect()->route('bookdocs.index');
    }
}
