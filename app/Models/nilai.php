<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    protected $table = 'nilai';
    public $timestamps = false;
    use HasFactory;

    public function indikator()
    {
        return $this->belongsTo(indikator::class);
    }
}
