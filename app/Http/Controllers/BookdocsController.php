<?php

namespace App\Http\Controllers;

use App\Models\bookdocs;
use App\Models\standard;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class BookdocsController extends Controller
{
    public function indexformulir()
    {
        $formulir = Bookdocs::where('jenis_file', 'formulir')->get();
        return view('admin.book.bookdocs.formulir', compact('formulir'));
    }

    public function tambahFormulir()
    {
        $standard = Standard::where('pegawai_id', Auth::user()->id)->get();
        return view('admin.book.bookdocs.tambah_formulir',compact('standard'));
    }

    public function uploadFormulir(Request $request)
    {
        $formulir = new Bookdocs;
        $file = $request->file('nama_file')->store('Formulir');
        $name_file =  $request->file('nama_file')->hashName();
        $formulir->nama = $request->nama;
        $formulir->jenis = $request->jenis;
        $formulir->jenis_file = 'formulir';
        $formulir->standard_id = $request->standar_id;
        $formulir->nama_file = $name_file;
        $formulir->save();
        Alert::success('Sukses', 'Formulir Disimpan');
        return redirect()->route('formulir.index');
    }

    public function editFormulir($id)
    {
        $formulir = Bookdocs::find($id);
        $standard = Standard::where('pegawai_id', Auth::user()->id)->get();
        return view('admin.book.bookdocs.edit_formulir', compact('formulir','standard'));
    }

    public function updateFormulir(Request $request, $id)
    {
        $formulir = Bookdocs::find($id);
        if (!empty($request->nama_file )){
            $filepath = public_path('storage/Formulir/' . $formulir->nama_file);
            if (file_exists($filepath)){
                unlink($filepath);
            }
            $formulir->nama = $request->nama;
            $formulir->jenis = $request->jenis;
            $formulir->standard_id = $request->standar_id;
            $file = $request->file('nama_file')->store('Formulir');
            $name_file =  $request->file('nama_file')->hashName();
            $formulir->nama_file = $name_file;
            $formulir->save();
            Alert::success('Sukses', 'Formulir Diperbarui');
            return redirect()->route('formulir.index');

        }else{
            $formulir->nama = $request->nama;
            $formulir->jenis = $request->jenis;
            $formulir->standard_id = $request->standar_id;
            $formulir->save();
            Alert::success('Sukses', 'Formulir Diperbarui');
            return redirect()->route('formulir.index');
        }
    }
    public function hapusFormulir($id)
    {
        $formulir = Bookdocs::find($id);
        $filepath = public_path('storage/Formulir/' . $formulir->nama_file);
        if (file_exists($filepath)){
            unlink($filepath);
        }
        $formulir->delete();
        Alert::success('Sukses', 'Formulir Dihapus');
        return redirect()->route('formulir.index');
    }


    public function indexSOP()
    {
        $sop = Bookdocs::where('jenis_file', 'SOP')->get();
        return view('admin.book.bookdocs.SOP', compact('sop'));
    }

    public function tambahSOP()
    {
        $standard = Standard::where('pegawai_id', Auth::user()->id)->get();
        return view('admin.book.bookdocs.tambah_SOP',compact('standard'));
    }

    public function uploadSOP(Request $request)
    {
        $sop = new Bookdocs();
        $file = $request->file('nama_file')->store('SOP');
        $name_file =  $request->file('nama_file')->hashName();
        $sop->nama = $request->nama;
        $sop->jenis = $request->jenis;
        $sop->jenis_file = 'SOP';
        $sop->standard_id = $request->standar_id;
        $sop->nama_file = $name_file;
        Alert::success('Sukses', 'SOP Tersimpan');
        $sop->save();

        return redirect()->route('SOP.index');
    }

    public function editSOP($id)
    {
        $sop = Bookdocs::find($id);
        $standard = Standard::where('pegawai_id', Auth::user()->id)->get();
        return view('admin.book.bookdocs.edit_SOP', compact('sop','standard'));
    }

    public function updateSOP(Request $request, $id)
    {
        $sop = Bookdocs::find($id);
        if (!empty($request->nama_file )){
            $filepath = public_path('storage/SOP/' . $sop->nama_file);
            if (file_exists($filepath)){
                unlink($filepath);
            }
            $sop->nama = $request->nama;
            $sop->jenis = $request->jenis;
            $sop->standard_id = $request->standar_id;
            $file = $request->file('nama_file')->store('SOP');
            $name_file =  $request->file('nama_file')->hashName();
            $sop->nama_file = $name_file;
            $sop->save();
            Alert::success('Sukses', 'SOP Diperbarui');
            return redirect()->route('SOP.index');

        }else{
            $sop->nama = $request->nama;
            $sop->jenis = $request->jenis;
            $sop->standard_id = $request->standar_id;
            $sop->save();
            Alert::success('Sukses', 'SOP Diperbarui');
            return redirect()->route('SOP.index');
        }
    }
    public function hapusSOP($id)
    {
        $sop = Bookdocs::find($id);
        $filepath = public_path('storage/SOP/' . $sop->nama_file);
        if (file_exists($filepath)){
            unlink($filepath);
        }
        $sop->delete();
        Alert::success('Sukses', 'SOP Dihapus');
        return redirect()->route('SOP.index');
    }
}
