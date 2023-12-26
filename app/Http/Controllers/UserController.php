<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\prodi;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = User::with('roles')->get();
        return view('admin.pegawai.pegawai', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatan = Role::get();
        $prodi = Prodi::get();
        return view('admin.pegawai.tambah_pegawai', compact('jabatan','prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'prodi_id' => $request->prodi_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->status,
        ]);

        $role = Role::findById($request->jabatan_id);
        $user->assignRole($role);
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
        $jabatan = Role::get();
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
            $pegawai->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'prodi_id' => $request->prodi_id,
                'status' => $request->status,
            ]);
            $role = Role::findById($request->jabatan_id);
            $pegawai->syncRoles([$role]);
            return redirect()->route('pegawai.index');
        }else{
            $pegawai->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'prodi_id' => $request->prodi_id,
                'status' => $request->status,
            ]);
            $role = Role::findById($request->jabatan_id);
            $pegawai->syncRoles([$role]);
            return redirect()->route('pegawai.index'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        $pegawai = User::find($user);
        $pegawai->syncRoles([]);
        $pegawai->delete();
        return redirect()->route('pegawai.index');
    }
}
