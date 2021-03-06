<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index()
    {
        $coach = User::find(9);
        return view('coaches.index', ['name' => $coach->name]);
    }
    public function profile()
    {
        $coach = User::find(9);
        return view('coaches.profile', ['coach' => $coach]);
    }
    public function edit()
    {
        $coach = User::find(9);
        return view('coaches.edit', ['coach' => $coach]);
    }
    public function update()
    {
        return "update profile";
    }
    public function sessions()
    {
        return view('coaches.sessions');
    }
    public function password()
    {
        return view('coaches.password');
    }
}
