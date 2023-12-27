<?php

namespace App\Policies;

use App\Models\bookmanual;
use App\Models\bookstandar;
use App\Models\indikator;
use App\Models\User;

class AksesPolicy
{
    /**
     * Create a new policy instance.
     */
    public function aksesIndikator(User $user, indikator $indikator)
    {
        return $user->id == $indikator->pegawai_id;
    }

    public function aksesbookStandard(User $user, bookstandar $bookstandar)
    {

        return $user->id == $bookstandar->pegawai_id;
    }
    
    public function __construct()
    {
        //
    }
}
