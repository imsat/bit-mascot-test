<?php

namespace App\Services;


use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\Hash;

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
     * Update user password.
     */
    public function updatePassword($request)
    {
        $user = $request->user();
        $data = $request->only('old_password', 'new_password', 'confirm_password');
        if (Hash::check($data['old_password'], $user->password)) {
            $user->update([
                'password' => Hash::make($data['confirm_password']),
            ]);
            return true;
        }
        return false;
    }

}
