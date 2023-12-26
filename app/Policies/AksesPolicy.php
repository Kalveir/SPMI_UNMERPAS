<?php

namespace App\Policies;

use App\Models\indikator;
use App\Models\User;

class AksesPolicy
{
    /**
     * Create a new policy instance.
     */
    public function aksesIndikator(User $user, indikator $indikator_pegawai)
    {
        return $user->id == $indikator_pegawai->pegawai_id;
    }
    
    public function __construct()
    {
        //
    }
}
