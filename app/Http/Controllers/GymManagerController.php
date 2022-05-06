<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Staff;
use App\Models\City;
use App\Models\Gym;
use App\Models\GymManager;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GymManagerController extends Controller
{
    public function index()
    {
        $gymManagers = User::role('gym_manager')->get();

        if (Auth::user()->hasRole('city_manager')) {
            $gyms = City::where('user_id', Auth::user()->id)->first()->gyms;
            $gymManagers = collect();
            foreach ($gyms as $gym) {
                $gymMangs = $gym->gymManager;
                foreach ($gymMangs as $manager) {
                    $gymManagers->push($manager);
                }
            }
        }
        if (request()->ajax()) {
            return datatables()->of($gymManagers)
                ->addColumn('action', function ($data) {
                    $banStatus = $data->isBanned() ? "unban" : "ban";
                    $buttonColor = $data->isBanned() ? "secondary" : "warning";
                    $button = '<a href="' . route('gym-managers.edit', $data->id) . '" class="btn btn-info btn-sm mx-2">Edit</a>';
                    $button .= '<a href="javascript:void(0);" onClick = "deleteFunc(' . $data->id . ')"class="btn btn-danger btn-sm mx-2">Delete</a>';
                    $button .= '<a href="javascript:void(0);" onClick = "ban(' . $data->id . ')"class="btn btn-' . $buttonColor . ' btn-sm mx-2">' . $banStatus . '</a>';
                    return $button;
                })
                ->addColumn('gym-city', function ($data) {
                    $gymManage = GymManager::where('user_id', $data->id)->first();
                    if (isset($gymManage)) {
                        $gym = Gym::find($gymManage->gym_id);
                        $city = City::find($gym->city_id);
                        return $gym->name . '-' . $city->name;
                    }
                    return "None";
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('gym-managers.index');
    }


    //--------------------------- edit user member -----------------------
    public function edit($userId)
    {

        $user = User::find($userId);
        $gymId = GymManager::where('user_id', $userId)->first()->gym_id;
        $gym = Gym::find($gymId);
        $cityGyms = $gym->city->gyms;
        $cities = City::all();
        $gyms = Gym::all();

        return view('gym-managers.edit', [
            'user' => $user,
            'gyms' => $gyms,
            'cities' => $cities,
            'gym' => $gym,
            'cityGyms' => $cityGyms,

        ]);
    }
    public function update($userId)
    {
        $requestData = request()->all();
        $post = User::find($userId)->update([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'password' => $requestData['password'],
            'avatar' => $requestData['avatar'],
            'national_id' => $requestData['national_id'],
            'is_baned' => 0,
            'role' => "gym_manager",
        ]);

        $gym = gymManager::where('user_id', $userId)->update([
            'gym_id' => $requestData['gym']
        ]);

        // $gym->gym_id = $requestData['gym'];
        // $gym->save();

        return redirect()->route('gym-managers.index');
    }
    //----------------------- create new member -------------------------
    public function create()
    {
        $cities = City::all();
        $gyms = Gym::all();
        return view(
            'gym-managers.create',
            [
                'cities' => $cities,
                'gyms' => $gyms,
            ]
        );
    }
    public function store()
    {
        $requestData = request()->all();

        User::create([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'password' => $requestData['password'],
            'avatar' => $requestData['avatar'],
            'national_id' => $requestData['national_id'],
            'is_baned' => 0,
            'role' => "gym_manager",
        ]);
        $userMember = User::where('name', $requestData['name'])->first();



        gymManager::Create(
            [
                'user_id' => $userMember->id,


                'gym_id' => $requestData['gym']
            ]
        );


        return redirect()->route('gym-managers.index');
    }
    //-------------------- delete member -------------------------------

    public function destroy(Request $request)
    {

        $member = User::where('id', $request->id)->delete();
        return Response()->json($member);
    }
    public function ban(Request $request)
    {
e4bbd4fcce72
n($ban);
    }
}
