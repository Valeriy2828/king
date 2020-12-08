<?php

namespace App\Observers;

use App\Models\Usermeta;
use App\User;


class UserObserver
{

    private $first_name;

    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $this->first_name = (!isset($user->first_name) && !isset($user->last_name))? $user->name :$user->first_name;

        $usermeta = new Usermeta([
            'first_name' => $this->first_name,
            'last_name' => isset($user->last_name)? $user->last_name: null
        ]);

        $user->usermeta()->save($usermeta);
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //

        $user->usermeta()->delete();
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
