<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\prodi;
use RealRashid\SweetAlert\Facades\Alert;
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
        $jabatan = Role::where('name','not like','%auditor%')->get();
        $prodi = Prodi::get();
        return view('admin.pegawai.tambah_pegawai', compact('jabatan','prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $duplikat = User::where('email', $request->email)->first();
        if($duplikat)
        {
            Alert::error('Gagal', 'Email sudah terdaftar');  
            return redirect()->route('pegawai.index');
        }else
        {
            $user = new User;
            $user->prodi_id= $request->prodi_id;
            $user->nama= $request->nama;
            $user->email= $request->email;
            $user->password= bcrypt($request->password);
            $user->status= $request->status;
            $user->save();

            $role = Role::findById($request->jabatan_id);
            $user->assignRole($role);
            Alert::success('Sukses', 'Data Pegawai Tersimpan');
            return redirect()->route('pegawai.index');
        }
        
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
        $jabatan = Role::where('name','not like','%auditor%')->get();
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
            $pegawai->prodi_id= $request->prodi_id;
            $pegawai->nama= $request->nama;
            $pegawai->email= $request->email;
            $pegawai->password= bcrypt($request->password);
            $pegawai->status= $request->status;
            $pegawai->save();
        }else{
            $pegawai->prodi_id= $request->prodi_id;
            $pegawai->nama= $request->nama;
            $pegawai->email= $request->email;
            $pegawai->status= $request->status;
            $pegawai->save();
        }
        $role = Role::findById($request->jabatan_id);
        $pegawai->syncRoles([$role->id]); 
        Alert::success('Sukses', 'Data Pegawai Diperbarui');
        return redirect()->route('pegawai.index');      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        $pegawai = User::find($user);
        $pegawai->syncRoles([]);
        $pegawai->delete();
        Alert::success('Sukses', 'Data Pegawai Dihapus');
        return redirect()->route('pegawai.index');
    }
}
