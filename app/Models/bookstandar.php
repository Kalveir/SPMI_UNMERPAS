<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookstandar extends Model
{
    protected $table = 'bookstandard';
    public $timestamps = false; 
    use HasFactory;

    public function pegawai()
    {
        return $this->belongsTo(User::class); 
    }
    public function standard()
    {
        return $this->belongsTo(standard::class);
    }
    public function jenis()
    {
        return $this->belongsTo(jenis::class);
    }
}
