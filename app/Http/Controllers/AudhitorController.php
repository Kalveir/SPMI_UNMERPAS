<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AudhitorController extends Controller
{
    public function listAudhitor()
    {
        return view('admin.audhitor.audhitor');
    }

    public function addAudhitor()
    {
        $roles = Role::where('name', 'like', 'Audhitor%')->get();
        $single_role = User::hasSingleRole()->get();
        return view('admin.audhitor.addAudhitor', compact('roles', 'single_role'));
    }

    public function storeAudhitor(Request $request)
    {
        $jabatan_id = $request->input('jabatan_id');
        $data_tabel = json_decode($request->input('data_tabel'), true);
        $id_users_array = [];

        if (is_array($data_tabel)) {
            foreach ($data_tabel as $data) {
                $id_users = $data;
                $id_users_array[] = $id_users;
                
            }
            return $id_users_array;
        }


    }
}
