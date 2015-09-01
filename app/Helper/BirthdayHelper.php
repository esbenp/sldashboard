<?php

namespace App\Helper;

use App\Service\UserService;

class BirthdayHelper
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Get all users with a birthday today
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getUsersWithBirthdayToday()
    {
        $today = new \DateTime;
        $asString = $today->format('Y-m-d');

        return $this->userService->getWhere('birthday', $asString);
    }
}
