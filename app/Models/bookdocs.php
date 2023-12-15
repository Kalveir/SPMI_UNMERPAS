<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookdocs extends Model
{
    protected $table = 'bookdocs';
    public $timestamps = false;
    use HasFactory;

    public function standard()
    {
        return $this->belongsTo(standard::class);
    }
}
