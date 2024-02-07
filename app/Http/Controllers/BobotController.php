<?php

namespace App\Http\Controllers;
use App\Models\indikator;
use App\Models\bobot_nilai;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    public function index()
    {
      $bobot = Bobot_nilai::get();
      return view('admin.bobot.list_bobot',compact('bobot'));
    }

    public function create()
    {
      $indikator = Indikator::get();
      return view('admin.bobot.tambah_bobot',compact('indikator'));
    }

    public function store(Request $request)
    {
      $cek_indikator = Bobot_nilai::where('indikator_id',$request->indikator_id)->first();
      if($cek_indikator)
        {
            Alert::error('Gagal', 'Bobot Nilai Sudah Terdaftar');
            return redirect()->route('bobot.index');
        }else{
          $bobot = new Bobot_nilai;
          $bobot->indikator_id = $request->indikator_id;
          $bobot->bobot = $request->nilai;
          $bobot->save();
          Alert::success('Sukses', 'Bobot Nilai Disimpan');
          return redirect()->route('bobot.index');  
        }
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {

    }
}
