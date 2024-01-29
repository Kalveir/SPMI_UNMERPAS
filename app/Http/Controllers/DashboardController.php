<?php

namespace App\Http\Controllers;

use App\Models\nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\pengisian;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahuns = Pengisian::distinct()->pluck('tahun');

        $tahun = date("Y");
        $pengisian = Pengisian::join('nilai', 'pengisian.nilai', '=', 'nilai.id')
        ->join('indikator', 'pengisian.indikator_id', '=', 'indikator.id')
        ->where('pengisian.program_studi', Auth::user()->prodi_id)
        ->where('tahun',$tahun)
        ->select('pengisian.*', 'nilai.nilai as bobot_nilai', 'indikator.target')
        ->orderBy('indikator.id')
        ->get();


        return view('admin.dashboard',compact('pengisian','tahuns'));
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

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
