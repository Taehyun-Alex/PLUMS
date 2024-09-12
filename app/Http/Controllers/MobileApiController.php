<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\MobileApiLoginRequest;
use App\Http\Requests\MobileRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MobileApiController extends Controller
{
    public function login(MobileApiLoginRequest $request) {
        $validated = $request->validated();

        if (Auth::attempt($validated)) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;

            return ApiResponseClass::sendResponse([
                'accessToken' => $token,
                'type' => 'Bearer'
            ], 'Logged in successfully');
        }

        return ApiResponseClass::sendResponse([], 'Invalid Credentials', false, 401);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return ApiResponseClass::sendResponse([], 'Logged out successfully');
    }

    public function register(MobileRegisterRequest $request) {
        $validated = $request->validated();
        $user = User::create($validated);
        $token = $user->createToken('API Token')->plainTextToken;

        return ApiResponseClass::sendResponse([
            'accessToken' => $token,
            'type' => 'Bearer'
        ], 'Account created successfully', true, 201);
    }

    public function currentUser(Request $request) {
        $user = auth('sanctum')->user();

        if (!$user) {
            return ApiResponseClass::sendResponse([], 'You are not logged in', false, 401);
        }

        return ApiResponseClass::sendResponse([
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'icon' => null
        ], 'Successfully fetched account details');
    }
}
