<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bobot_nilai extends Model
{
    protected $table = 'bobot';
    public $timestamps = false;
    use HasFactory;

    public function indikator()
    {
        return $this->belongsTo(indikator::class);
    }
}
