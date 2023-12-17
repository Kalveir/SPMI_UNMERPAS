<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengisian_berkas extends Model
{
    protected $table = 'pengisian_berkas';
    public $timestamps = false;
    use HasFactory;

    // public function indikator(){
    //     return $this->belongsTo(indikator::class); 
    // }

    // public function pengisian(){
    //     return $this->belongsTo(pengisian::class);
    // }

    // public function prodi(){
    //     return $this->belongsTo(prodi::class);
    // }

    // public function pegawai(){
    //     return $this->belongsTo(User::class);
    // }
}
