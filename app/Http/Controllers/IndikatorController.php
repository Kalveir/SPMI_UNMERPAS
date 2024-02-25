<?php

namespace App\Http\Controllers;

use App\Models\indikator;
use App\Models\standard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $indikator = Indikator::where('pegawai_id', Auth::user()->id)->get();
        $indikator = Indikator::get();
        return view('admin.indikator.indikator', compact('indikator'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $standard = Standard::orderBy('id', 'desc')->get();
        // $standard = Standard::where('pegawai_id', Auth::user()->id)->get();

        return view('admin.indikator.tambah_indikator', compact('standard'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $indikator = new Indikator();
        $indikator->pegawai_id = Auth::user()->id;
        $indikator->standard_id = $request->standar_id;
        $indikator->isi = $request->isi;
        $indikator->strategi = $request->strategi;
        $indikator->indikator = $request->indikator;
        $indikator->satuan = $request->satuan;
        $indikator->target = $request->target;
        $indikator->status = $request->status;
        $indikator->save();

        Alert::success('Sukses', 'Indikator Ditambahkan');
        return redirect()->route('indikator.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(indikator $indikator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($indikator)
    {
        $indikator = Indikator::find($indikator);
        // $standard = Standard::where('pegawai_id', Auth::user()->id)->get();
        $standard = Standard::orderBy('id', 'desc')->get();
        // $this->authorize('aksesIndikator',$indikator);
        return view('admin.indikator.edit_indikator', compact('indikator', 'standard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $indikator)
    {
        $indikator = Indikator::find($indikator);
        // $indikator->pegawai_id = Auth::user()->id;
        $indikator->standard_id = $request->standar_id;
        $indikator->isi = $request->isi;
        $indikator->strategi = $request->strategi;
        $indikator->indikator = $request->indikator;
        $indikator->satuan = $request->satuan;
        $indikator->target = $request->target;
        $indikator->status = $request->status;
        $indikator->save();
        Alert::success('Sukses', 'Indikator Diperbarui');
        return redirect()->route('indikator.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($indikator)
    {
        try{
            $indikator = Indikator::find($indikator);
            $indikator->delete();
            Alert::success('Sukses', 'Indikator Dihapus');
            return redirect()->route('indikator.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Tindakan ditolak');
            return redirect()->route('indikator.index');
        }
       
    }
}
