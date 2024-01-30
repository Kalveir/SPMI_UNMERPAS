<?php

namespace App\Http\Controllers;
use App\Models\nilai;
use App\Models\indikator;
use Illuminate\Support\Facades\Auth;
use App\Models\pengisian;
use App\Models\bookstandar;
use App\Models\pengisian_berkas;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        //get jumlah Pegawai

        $jumlah_user = User::count();

        // get jumlah berkas
        $berkas_submit = Pengisian_berkas::where('pegawai_id', Auth::user()->id)->where('jenis','<>','Pengendalian')->count();
        
        //get indikator
        $indikator_jumlah = indikator::count();
        
        //get jumlah auditor
        $auditorRoles = Role::where('name', 'like', '%Auditor%')->pluck('id')->toArray();
        $jumlah_auditor = User::whereHas('roles', function ($query) use ($auditorRoles) {
                $query->whereIn('role_id', $auditorRoles);
            })
        ->count();

        //get jumlah indikator

        $bookstandard_jumlah = Bookstandar::count();


        // get jumlah dosen
        $dosenRole = Role::where('name', 'Dosen')->first();
        $jumlah_dosen = User::whereHas('roles', function ($query) use ($dosenRole) {
                            $query->where('role_id', $dosenRole->id);
                        })
                        ->where('prodi_id', Auth::user()->prodi_id)
                        ->count();
        // statistik
        $brody = Pengisian::distinct()->pluck('tahun')->max();
        $tahuns = (array) $request->input('year', $brody);

        // Query untuk mendapatkan data pengisian
        $pengisian = Pengisian::join('nilai', 'pengisian.nilai', '=', 'nilai.id')
            ->join('indikator', 'pengisian.indikator_id', '=', 'indikator.id')
            ->where('pengisian.program_studi', Auth::user()->prodi_id)
            ->whereIn('tahun', $tahuns)
            ->select('pengisian.*', 'nilai.nilai as bobot_nilai', 'indikator.target')
            ->orderBy('indikator.id')
            ->get();

        // Query untuk mendapatkan tahun-tahun distinct
        $tahunz = Pengisian::distinct()->orderByDesc('tahun')->pluck('tahun');

        // Menampilkan data menggunakan view
        return view('admin.dashboard', compact('pengisian', 'tahuns', 'tahunz','berkas_submit','indikator_jumlah', 'jumlah_dosen','jumlah_auditor','bookstandard_jumlah','jumlah_user'));
    }

}
