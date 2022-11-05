<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function registerIndex(User $user = null)
    {
        return view('auth.register', [
            'user' => $user
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $user = User::query()->where('email', $request->email)->firstOrFail();

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('message', 'Credential data is not correct');
        }

        if (Auth::attempt(credentials: $credentials)) {
            return redirect()->route('home');
        }

        return redirect()->back()->with('message', 'Can\'t login');
    }

    public function register(Request $request, User $user = null)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'password' => $request->has('password') ? 'required|string|confirmed' : '',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')) {

            if (File::exists(public_path($user?->image)))
                File::delete(public_path($user?->image));

            $data['image'] = '/' . $request->file('image')->store(path: 'Users/Profile', options: 'upload');
        }
        if (is_null($user))
            $data['password'] = bcrypt($request->get('password'));

        User::query()->updateOrCreate(['id' => $user?->id], $data);

        if ($user?->id) {
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
