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
      $bobot = Bobot_nilai::find($id);
      $indikator = Indikator::get();
      return view('admin.bobot.edit_bobot',compact('bobot','indikator'));
    }

    public function update(Request $request, $id)
    {
      $bobot = Bobot_nilai::find($id);
      $bobot->indikator_id = $request->indikator_id;
      $bobot->bobot = $request->nilai;
      $bobot->save();
      Alert::success('Sukses', 'Bobot Nilai Diperbarui');
      return redirect()->route('bobot.index');
    }

    public function delete($id)
    {
      $bobot = Bobot_nilai::find($id);
      $bobot->delete();
      return redirect()->route('bobot.index');
    }
}
