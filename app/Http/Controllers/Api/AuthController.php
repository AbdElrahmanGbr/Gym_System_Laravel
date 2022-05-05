<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Notifications\Notification;
use App\Notifications\WelcomeEmailNotification;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'birth_date' => 'required',
            'profile_image' => 'required|image|mimes:jpg,jpeg',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imgs');
            $image->move($destinationPath, $name);
            $imageName = 'imgs/' . $name;
        }
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'profile_image' => $imageName
        ]);
        $user->assignRole('user');
        $user->save();

        $user->sendEmailVerificationNotification();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
        $user->notify(new WelcomeEmailNotification());
    }
}