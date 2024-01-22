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
        // $pengisian = Pengisian::join('nilai', 'pengisian.indikator_id', '=', 'nilai.indikator_id')
        // ->join('indikator', 'pengisian.indikator_id', '=', 'indikator.id')
        // ->where('pengisian.program_studi', Auth::user()->prodi_id)
        // ->selectRaw('pengisian.*, nilai.*, (pengisian.nilai * nilai.nilai) as hasil_perkalian, indikator.target')
        // ->get();
        $pengisian = Pengisian::join('nilai as n', 'pengisian.indikator_id', '=', 'n.indikator_id')
        ->join('indikator as i', 'pengisian.indikator_id', '=', 'i.id')
        ->where('pengisian.program_studi', Auth::user()->prodi_id)
        ->selectRaw('pengisian.*, n.*, (pengisian.nilai * n.nilai) as hasil_perkalian, i.target')
        ->get();

        return view('admin.dashboard',compact('pengisian'));
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
        //
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
