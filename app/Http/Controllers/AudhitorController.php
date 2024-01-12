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
        return view('admin.audhitor.addAudhitor',compact('roles','single_role'));
    }

    public function storeAudhitor(Request $request)
    {
        return $request->all();
    }
}