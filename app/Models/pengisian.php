<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengisian extends Model
{
    protected $table = 'pengisian';
    public $timestamps = false;
    use HasFactory;

    public function pegawai(){
        return $this->belongsTo(User::class);
    }

    public function indikator(){
        return $this->belongsTo(indikator::class);
    }

    public function prodi(){
        return $this->belongsTo(prodi::class, 'program_studi');
    }

    public function pengisian_berkas(){
        return $this->hasMany(pengisian_berkas::class);
    }
}
