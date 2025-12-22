<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    
    public function delete(User $user, User $model)
    {
        // Never delete an owner
        if ($model->hasRole('Owner')) {
            return false; // hard NO
        }
    
        // Check permission for other users
        return $user->can('delete users');
    }

}
