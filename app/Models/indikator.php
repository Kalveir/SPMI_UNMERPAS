<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class indikator extends Model
{
    protected $table = 'indikator';
    public $timestamps = false ; 
    use HasFactory;

    public function pegawai()
    {
        return $this->belongsTo(User::class); 
    }
    public function standard()
    {
        return $this->belongsTo(standard::class);
    }
    public function pengisian()
    {
        return $this->belongsTo(pengisian::class);
    }
}
