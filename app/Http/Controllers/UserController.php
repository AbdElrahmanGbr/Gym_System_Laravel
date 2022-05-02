<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index()
    {
        //$users = User::all();
        if (request()->ajax()) {
            return datatables()->of(User::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button"
                   name="add" id="' . $data->id . '"
                   class="btn btn-primary btn-sm">Add
                   </button>';
                    return $button;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('users.index');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->email)->plainTextToken;

        return ['token'=>$token, 'data'=>new UserResource($user)];

    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'gender'=>'required',
            'password'=>'required|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'required',
            // 'date_of_birth'=>'required',
            // 'avatar'=>'required'
        ]);

        $data = $request->all();
        $data['password']=Hash::make($data['password']);
        $user = User::create($data);
        $token = $user->createToken($request->email)->plainTextToken;

        return ['token'=>$token, 'data'=>new UserResource($user)];
    }
}
