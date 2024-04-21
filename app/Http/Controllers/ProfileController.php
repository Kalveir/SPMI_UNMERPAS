<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class ProfileController extends Controller
{
    public function ProfilInfo($id)
    {
        if(Auth::user()->id == $id)
        {
            $profile = User::where('id', $id)->first();
            return view('admin.profile',compact('profile'));
        }else 
        {
            Alert::error('Gagal', 'Akses Ditolak');
            return back();
        }
        // return $profile;
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
            Alert::success('Sukses', 'Data Akun Diperbarui');
            return redirect()->route('profile.ProfilInfo',$id);
            // return redirect()->back(); 
        }else{
            $profil->nama = $request->nama;
            $profil->email = $request->email;
            $profil->save();
            Alert::success('Sukses', 'Data Akun Diperbarui');
            return redirect()->route('profile.ProfilInfo');
            // return redirect()->back(); 
        }
    }
}
