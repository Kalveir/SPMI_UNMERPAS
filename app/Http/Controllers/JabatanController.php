<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;



class JabatanController extends Controller
{

    public function index()
    {
        $jabatan = Role::get();
        return view('admin.jabatan',compact('jabatan'));
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
        Role::create(['name'=>$request->nama]);
        return redirect()->route('jabatan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $jabatan)
    {
        $jabatan = Role::findById($jabatan);
        $jabatan->name = $request->nama;
        $jabatan->save();
        return redirect()->route('jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($jabatan)
    {
        $jabatan = Role::findById($jabatan);
        $jabatan->delete();
        return redirect()->route('jabatan.index'); 
    }
}
