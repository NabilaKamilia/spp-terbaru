<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use Response;

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth()->attempt($credentials)) {
            return $this->error('Unauthorized', 401);
        }

        return $this->success(['token' => $token], 'Login Success');
    }

    public function logout()
    {
        auth()->logout();

        return $this->success([], 'Logout Success');
    }

    public function me()
    {
        try {

            $user = User::find(Auth::user()->id);

            return $this->success($user, 'User data successfully retrieved');
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }
}
