<?php

namespace App\Service;

use App\User;
use Hash;

class UserService
{
    /**
     * Find user
     *
     * @return User
     */
    public function getUser()
    {
        return User::all()->first();
    }

    /**
     * Create user
     *
     * @param array $data
     * @return bool
     */
    public function create(array $data)
    {
        if (!isset($data['email']) || !isset($data['password'])) {
            return false;
        }

        $user = new User();
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);

        return $user->save();
    }

    /**
     * Save user
     *
     * @param User $user
     * @return bool
     */
    public function save(User $user)
    {
        return $user->save();
    }
}
