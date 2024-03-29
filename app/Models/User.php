<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;
    protected $table = 'pegawai';
    public $timestamps = false;
    protected $fillable = ['prodi_id','nama', 'email','password', 'status'];


    // public function hasAnyRole($roles)
    // {
    //     return in_array($this->role, explode(',', $roles));
    // }
    public function role()
    {
        return $this->BelongsToMany(Role::class,'model_has_roles','model_id','role_id');
    }
    public function prodi()
    {
        return $this->belongsTo(prodi::class);
    }
    public function scopeHasSingleRole($query)
    {
    return $query->with('roles') // Eager load roles
                 ->whereHas('roles', function ($query) {
                     $query->havingRaw('count(*) = 1')->groupBy('id');
                 });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'email',
    //     'password',
    // ];

    
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'password' => 'hashed',
    // ];
}
