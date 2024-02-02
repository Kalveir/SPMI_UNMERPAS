<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AudhitorController extends Controller
{
    public function listAudhitor()
    {
        $pegawai_audhitor = [];
        $users = User::with('roles')->get();

        foreach ($users as $user) {
            $roles = $user->getRoleNames();
        
            if (count($roles) > 1) {

                $audhitorRole = null;
                $jabatanRole = null;
        
                foreach ($roles as $role) {
                    if (strpos($role, 'Auditor') !== false) {
                        $audhitorRole = $role;
                    } else {
                        $jabatanRole = $role;
                    }
                }
        
                if ($audhitorRole !== null) {
                    $pegawai_audhitor[] = [
                        'user' => $user,
                        'audhitorRole' => $audhitorRole,
                        'jabatanRole' => $jabatanRole,
                    ];
                }
            }
        }
        
        return view('admin.audhitor.audhitor',compact('pegawai_audhitor'));
    }

    public function addAudhitor()
    {
        $roles = Role::where('name', 'like', 'Auditor%')->get();
        $single_role = User::all()->filter(fn($user)=>$user->roles->count()== 1);
        return view('admin.audhitor.addAudhitor', compact('roles', 'single_role'));
    }

    public function storeAudhitor(Request $request)
    {
        $jabatan_id = $request->input('jabatan_id');
        $data_tabel = json_decode($request->input('data_tabel'), true);

        $role = Role::findById($jabatan_id);

        if (is_array($data_tabel)) {
            foreach ($data_tabel as $data) {
                $id_users = $data;
                $pegawai = User::find($id_users); // Assuming your user model is named User
                if ($pegawai) {
                    $pegawai->assignRole($role);
                }
            }
        }
        return redirect()->route('audhitor.index');


    }

    public function destroyAudhitor($id)
    {
        $user = User::with('roles')->find($id);
        if ($user) {

            $rolesToRemove = $user->roles->filter(function ($role) {
                return str_contains($role->name, 'Auditor');
            });
            foreach ($rolesToRemove as $role) {
                $user->removeRole($role->name);
            }
        
            $user->save();
            return redirect()->route('audhitor.index');
        }
    }
}
