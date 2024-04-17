<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService extends Service
{
    private $filePath = '/user/nid';
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function register($request)
    {
        $userData = $request->only(['first_name', 'last_name', 'email', 'password']);
        $data = $request->except(['first_name', 'last_name', 'email', 'password']);
        // Hash user password
        $userData['password'] = Hash::make($userData['password']);
        $user = new User();
        $user->fill($userData);
        $user->save();

        if ($user) {
            // UserInfo
            if (data_get($data, 'nid')) {
                $data['nid'] = UploadService::upload($data['nid'], $this->filePath);
            }
            $user->userInfo()->create($data);

            // Manual login
            $this->loginService->authenticate($request);

            return true;
        }
        return false;

    }
}
