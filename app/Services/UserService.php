<?php

namespace App\Services;


use App\Models\User;
use App\Services\Service;

class UserService extends Service
{
    /**
     * Get all users.
     * @return mixed
     */
    public function userList()
    {
        $users = User::with('userInfo:user_id,address,phone,dob,nid')
            ->select(['id', 'first_name', 'last_name', 'email'])
            ->search()
            ->latest()
            ->paginate();
        return $users;
    }

    /**
     * Show user
     *
     * @param $user
     * @return mixed
     */
    public function show($user)
    {
        return $user->load('addresses:id,name,user_id');
    }

    /**
     * Trash user.
     *
     * @param $user
     * @return true
     */
    public function delete($user)
    {
        // Soft delete a user.
        $user->delete();
        return true;
    }

}
