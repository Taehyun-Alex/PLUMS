<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\MobileApiLoginRequest;
use App\Http\Requests\MobileProfileUpdateRequest;
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
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'phone_number' => $user->phone_number,
            'birth_date' => $user->birth_date,
            'gender' => $user->gender,
            'photo' => $user->photo
        ], 'Successfully fetched account details');
    }

    public function updateUser(MobileProfileUpdateRequest $request) {
        $validated = $request->validated();
        $user = auth('sanctum')->user();
        $user->update($validated);

        return ApiResponseClass::sendResponse([], "Successfully updated user information");
    }

    public function updatePhoto(Request $request) {
        $request->validate([
            'photo' => 'required|image',
        ]);

        $user = auth('sanctum')->user();
        $avatarName = time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path("avatars/$user->id"), $avatarName);
        $photoUrl = "avatars/$user->id/{$avatarName}";
        $user->update(['photo' => $photoUrl]);

        return ApiResponseClass::sendResponse(['url' => $photoUrl], "Successfully uploaded profile photo");
    }
}
