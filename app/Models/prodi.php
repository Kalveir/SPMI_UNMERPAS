<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    protected $table = 'program_studi';
    public $timestamps = false;
    use HasFactory;

    public function fakultas()
    {
        return $this->belongsTo(fakultas::class);
    }
}
