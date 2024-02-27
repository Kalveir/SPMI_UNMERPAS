<?php

namespace App\Http\Controllers;

use App\Models\prodi;
use App\Models\fakultas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::get();
        $fakultas = Fakultas::get();
        return view('admin.prodi',compact('prodi','fakultas'));
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
        $prodi = new Prodi;
        $prodi->nama = $request->nama;
        $prodi->fakultas_id = $request->fakultas_id;
        $prodi->save();
        Alert::success('Sukses', 'Program Studi Ditambahkan');
        return redirect()->route('prodi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $prodi)
    {
        $prodi = Prodi::find($prodi);
        $prodi->nama = $request->nama;
        $prodi->fakultas_id = $request->fakultas_id;
        $prodi->save();
        Alert::success('Sukses', 'Program Studi Diperbarui');
        return redirect()->route('prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($prodi)
    {
        // tambahkan alert warning di blade
        try
        {
            $prodis = Prodi::find($prodi);
            $prodis->delete();
            Alert::success('Sukses', 'Program Studi Terhapus');
            return redirect()->route('prodi.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Tindakan ditolak');
            return redirect()->route('prodi.index');
        }
    }
}
