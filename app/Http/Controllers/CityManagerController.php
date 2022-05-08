<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;
use App\Http\Requests\CityManagerRequest;
use App\Http\Requests\CityManagerUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;




class CityManagerController extends Controller {

    public function index() {
        if (request()->ajax()) {
            return datatables()->of(User::role('city_manager')->get())
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('city-managers.edit', $data->id) . '" class="btn btn-info btn-sm mx-2">Edit</a>';
                    $button .= '<a href="javascript:void(0);" onClick = "deleteFunc(' . $data->id . ')"class="btn btn-danger btn-sm mx-2">Delete</a>';
                    return $button;
                })
                ->addColumn('city', function ($data) {
                    $city = City::where('user_id', '=', $data->id)->first();
                    return $city ? $city->name : "None";
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('city-managers.index');
    }
    //--------------------------- edit User member -----------------------
    public function edit($userId) {

        $user = User::find($userId);
        $cities = City::all();
        return view('city-managers.edit', [
            'user' => $user,
            'cities' => $cities,

        ]);
    }
    public function update($userId, CityManagerUpdateRequest $request) {
        $requestData = request()->all();
        if (isset($requestData['avatar'])) {
            $imageName = time() . '.' . $requestData['avatar']->getClientOriginalName();
            $requestData['avatar']->move(public_path('images'), $imageName);
        } else {
            $imageName = User::find($userId)->avatar;
        }


        if (isset($request->oldpassword)) {
            $hashedPassword = User::find($userId)->password;
            if (Hash::check($request->oldpassword, $hashedPassword)) {

                $user = User::find($userId);
                $user->password = bcrypt($request->password);
                $user->save();
            } else {
                return Redirect::back()->withErrors(['msg' => 'Wrong old password']);
            }
        }



        User::find($userId)->update([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'avatar' => $imageName,
            'national_id' => $requestData['national_id'],

        ]);



        $oldCity = City::where('user_id', $userId)->first();
        if (!empty($oldCity)) {
            $oldCity->update([
                'user_id' => NULL
            ]);
        }

        $city = City::find($requestData['city']);
        $city->user_id =  $userId;
        $city->save();

        return redirect()->route('city-managers.index');
    }
    //----------------------- create new member -------------------------
    public function create() {

        $cities = City::all();
        return view(
            'city-managers.create',
            [
                'cities' => $cities,
            ]
        );
    }
    public function store(CityManagerRequest $request) {
        $requestData = request()->all();
        if (isset($requestData['avatar'])) {
            $imageName = time() . '.' . $requestData['avatar']->getClientOriginalName();
            $requestData['avatar']->move(public_path('images'), $imageName);
        } else {
            $imageName = 'user_avatar.png';
        }
        $cityManager = User::create([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'password' => Hash::make($requestData['password']),
            'avatar' =>  $imageName,
            'national_id' => $requestData['national_id'],
        ]);
        $cityManager->assignRole('city_manager');
        $userMember = User::where('name', $requestData['name'])->first();

        $city = City::find($requestData['city']);
        $city->user_id =  $userMember->id;
        $city->save();
        return redirect()->route('city-managers.index');
    }
    //-------------------- delete member -------------------------------
    public function destroy(Request $request) {

        $member = User::where('id', $request->id)->delete();
        return Response()->json($member);
    }
}
