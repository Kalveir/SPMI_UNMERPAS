<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class pegawai extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'pegawai';
    protected $guarded = ['id'];

    // protected $fillable = [
    //     'email',
    //     'password',
    // ];

    public $timestamps = false;

    use HasFactory;

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class);
    }
    public function prodi()
    {
        return $this->belongsTo(prodi::class);
    }
}
