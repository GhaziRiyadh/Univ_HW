<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $user = User::query()->where('email', $request->email)->firstOrFail();

        if (!Hash::check($request->password, $user->password)) {
            return response()->json('Credential data is not correct', 422);
        }

        if (Auth::attempt(credentials: $credentials)) {
            $token = $user->createToken($request->email);
            return response()->json([
                'user' => $user,
                'token' => $token->plainTextToken
            ]);
        }

        return response()->json('Credential data is not correct', 422);
    }

    public function register(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'password' => 'required|string|confirmed',
            'image' => 'required|image',
        ]);

        $data = $request->all();

        $data['image'] = $request->file('image')->store(path: 'Users/Profile', options: 'upload');
        $data['password'] = bcrypt($request->get('password'));

        User::query()->create($data);

        $this->login($request);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(true);
    }
}
