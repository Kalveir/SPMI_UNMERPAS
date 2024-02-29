<?php

namespace App\Http\Controllers;

use App\Models\fakultas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakultas = Fakultas::get();
        return view('admin.fakultas', compact('fakultas'));
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
        $fakultass = new fakultas;
        $fakultass->nama = $request->nama;
        $fakultass->save();
        Alert::success('Sukses', 'Fakultas Ditambahkan');
        return redirect()->route('fakultas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fakultas $fakultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $fakultas)
    {
        $fakultas = Fakultas::find(decrypt($fakultas));
        $fakultas->nama = $request->nama;
        $fakultas->save();
        Alert::success('Sukses', 'Fakultas Diperbarui');
        return redirect()->route('fakultas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($fakultas)
    {
        // tambahkan alert warning di blade
        try
        {
            $fk = Fakultas::find($fakultas);
            $fk->delete();
            Alert::success('Sukses', 'Fakultas Terhapus');
            return redirect()->route('fakultas.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Tindakan ditolak');
            return redirect()->route('fakultas.index');
        }

    }
}
