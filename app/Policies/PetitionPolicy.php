<?php

namespace App\Policies;

use App\Petition;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PetitionPolicy
{
    use HandlesAuthorization;
    public function before($user, $ability)
    {
        if ($user->isGranted(User::ROLE_ADMIN)) {
            return true;
        }
    }
    /**
     * Determine whether the user can view any petitions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can view the petition.
     *
     * @param  \App\User  $user
     * @param  \App\Petition  $petition
     * @return mixed
     */
    public function view(User $user, Petition $petition)
    {
        return $user->isGranted(User::ROLE_PROVIDER) && $user->id === $petition->user_transmitter_id || $user->id === $petition->user_receptor_id;
    }

    /**
     * Determine whether the user can create petitions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_SELLER) ;
    }

    /**
     * Determine whether the user can update the petition.
     *
     * @param  \App\User  $user
     * @param  \App\Petition  $petition
     * @return mixed
     */
    public function update(User $user, Petition $petition)
    {
        return $user->isGranted(User::ROLE_SELLER) && $user->id === $petition->user_transmitter_id;
    }

    /**
     * Determine whether the user can delete the petition.
     *
     * @param  \App\User  $user
     * @param  \App\Petition  $petition
     * @return mixed
     */
    public function delete(User $user, Petition $petition)
    {
        return $user->isGranted(User::ROLE_SELLER) && $user->id === $petition->user_transmitter_id;
    }

    /**
     * Determine whether the user can restore the petition.
     *
     * @param  \App\User  $user
     * @param  \App\Petition  $petition
     * @return mixed
     */
    public function restore(User $user, Petition $petition)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the petition.
     *
     * @param  \App\User  $user
     * @param  \App\Petition  $petition
     * @return mixed
     */
    public function forceDelete(User $user, Petition $petition)
    {
        //
    }
}
