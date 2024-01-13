<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class JabatanController extends Controller
{

    public function index()
    {
        $jabatan = Role::get();
        return view('admin.jabatan.jabatan',compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::all();
        return view('admin.jabatan.tambah_jabatan',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permission = $request->akses;
        $role = Role::create(['name'=>$request->nama]);
        foreach ($permission as $permisi){
            $permisi = Permission::firstOrCreate(['name'=>$permisi]);
            $role->givePermissionTo($permisi);
        }
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
        $jabatan = Role::findById($id);
        $permission = Permission::all();
        return view('admin.jabatan.edit_jabatan',compact('jabatan','permission'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $jabatan)
    {
        $role = Role::findById($jabatan);

        // Update the role's name if needed
        $role->update([
            'name' => $request->nama,
        ]);

        // Sync the permissions for the role
        // $permissions = $request->akses;
        // $role->syncPermissions($permissions);
        return redirect()->route('jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($jabatan)
    {
        $jabatan = Role::findById($jabatan);
        $jabatan->syncPermissions([]);
        $jabatan->delete();
        return redirect()->route('jabatan.index'); 
    }
}
