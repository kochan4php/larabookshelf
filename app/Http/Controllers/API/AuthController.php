<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseJson;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $attr = $request->only(['nama', 'username', 'email', 'password']);

            $validator = Validator::make($attr, [
                'nama' => ['required', 'min:2', 'max:255'],
                'username' => ['required', 'min:5', 'max:255', 'unique:users', 'alpha_dash'],
                'email' => ['required', 'min:6', 'max:255', 'unique:users', 'email'],
                'password' => ['required', 'min:6', 'max:255']
            ]);

            if ($validator->fails()) {
                return ResponseJson::error('failed', 'Registration Failed', $validator->errors());
            }

            $attr['password'] = bcrypt($attr['password']);
            $user = User::create($attr);
            return ResponseJson::success('Registration Successfully', $user);
        } catch (\Exception $e) {
            return ResponseJson::error('Something went wrong', $e);
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = User::where('email', $credentials['email'])->first();
                $token = $user->createToken('access_token')->plainTextToken;
                return ResponseJson::successWithToken('Login Success', $user, $token);
            }

            return ResponseJson::error('Credentials Not Match');
        } catch (\Exception $e) {
            return ResponseJson::error('Something went wrong', $e);
        }
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return ResponseJson::success('Logout Success');
    }

    public function getAuthUser()
    {
        return ResponseJson::success('Get The Authenticated User', Auth::user());
    }
}
