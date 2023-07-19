<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use Response;

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        // $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
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

            $user = Siswa::with('user')->where('user_id', Auth::user()->id)->first();


            return $this->success($user, 'User data successfully retrieved');
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }
}
