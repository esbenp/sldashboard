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
     * Update users data
     *
     * @param  array  $data
     * @return bool
     */
    public function update($id, array $data)
    {
        $user = User::find($id);

        if ($user === null) {
            return ['error' => _('No user was found.')];
        }

        $user->fill($data);

        return $this->save($user);
    }

    /**
     * Get users using a simple where clause
     *
     * @param  string $column
     * @param  string $value
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getWhere($column, $value)
    {
        return User::where($column, $value)->get();
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
