<?php

namespace App\Services;

use App\Contracts\IUserService;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserServices extends ModelService implements IUserService
{
    public function __construct()
    {
        parent::__construct(app(User::class));
    }

    public function checkCredentials(array $credentials): bool
    {
        $username = Arr::get($credentials, 'username');
        $password = Arr::get($credentials, 'password');
        // If there is missing one of the credentials
        if (empty($username) || empty($password)) {
            return false;
        }

        $user = $this->model->newQuery()->where('username', $username)->first();
        if (Hash::check($password, $user?->password)) {
            Auth::login($user);
            return true;
        }

        return false;
    }
}
