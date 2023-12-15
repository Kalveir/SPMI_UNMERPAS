<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class standard extends Model
{
    protected $table = 'standard';
    public $timestamps = false;
    use HasFactory;

    public function pegawai()
    {
        return $this->belongsTo(User::class); 
    }
    public function jabatan()
    {
        return $this->belongsTo(jabatan::class);
    }
    public function prodi()
    {
        return $this->belongsTo(prodi::class);
    }
}
