<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function registerIndex()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $user = User::query()->where('email', $request->email)->firstOrFail();

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors('message', 'Credential data is not correct');
        }

        if (Auth::attempt(credentials: $credentials)) {
            $token = $user->createToken($request->email);
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors(['message' => 'Credential data is not correct']);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'password' => 'required|string|confirmed',
            'image' => 'required|image',
        ]);

        $data = $request->all();

        $data['image'] = $request->file('image')->store(path: 'Users/Profile');
        $data['password'] = bcrypt($request->get('password'));

        User::query()->create($data);

        $this->login($request);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
