<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\jabatan;
use App\Models\prodi;
use App\Models\pengisian_berkas;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = User::get();
        return view('admin.pegawai.pegawai', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatan = Jabatan::get();
        $prodi = Prodi::get();
        return view('admin.pegawai.tambah_pegawai', compact('jabatan','prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pegawai = new User;
        $pegawai->nama = $request->nama;
        $pegawai->email = $request->email;
        $pegawai->password = bcrypt($request->password);
        $pegawai->jabatan_id = $request->jabatan_id;
        $pegawai->prodi_id = $request->prodi_id;
        $pegawai->status = $request->status;
        $pegawai->save();
        return redirect()->route('pegawai.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        $pegawai = User::find($user);
        $jabatan = Jabatan::get();
        $prodi = Prodi::get();
        return view('admin.pegawai.edit_pegawai', compact('pegawai','jabatan', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
        $pegawai = User::find($user);
        if (!empty($request->password ))
        {
            $pegawai->nama = $request->nama;
            $pegawai->email = $request->email;
            $pegawai->password = bcrypt($request->password);
            $pegawai->jabatan_id = $request->jabatan_id;
            $pegawai->prodi_id = $request->prodi_id;
            $pegawai->status = $request->status;
            $pegawai->save();
            return redirect()->route('pegawai.index'); 
        }else{
            $pegawai->nama = $request->nama;
            $pegawai->email = $request->email;
            $pegawai->jabatan_id = $request->jabatan_id;
            $pegawai->prodi_id = $request->prodi_id;
            $pegawai->status = $request->status;
            $pegawai->save();
            return redirect()->route('pegawai.index'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        $pegawai = User::find($user);
        $pegawai->delete();
        return redirect()->route('pegawai.index');
    }
}
