<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function ProfilInfo($id)
    {
        $profile = User::where('id', $id)->first();
        // return $profile;
        return view('admin.profile',compact('profile'));
    }

    public function UpdateProfil(Request $request,$id)
    {
        $profil = User::find($id);
        if (!empty($request->password ))
        {
            $profil->nama = $request->nama;
            $profil->email = $request->email;
            $profil->password = bcrypt($request->password);
            $profil->save();
            return redirect()->back(); 
        }else{
            $profil->nama = $request->nama;
            $profil->email = $request->email;
            $profil->save();
            return redirect()->back(); 
        }
    }
}
