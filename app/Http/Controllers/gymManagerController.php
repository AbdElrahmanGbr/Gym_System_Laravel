<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\City;
use App\Models\Gym;
use App\Models\GymManager;
use App\Models\User;

class gymManagerController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(User::where('role', 'gym_manager')->get())
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('gym-managers.edit', $data->id) . '" class="btn btn-info btn-sm mx-2">Edit</a>';
                    $button .= '<a href="javascript:void(0);" onClick = "deleteFunc(' . $data->id . ')"class="btn btn-danger btn-sm mx-2">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('gym-managers.index');
    }
    //--------------------------- edit User member -----------------------
    public function edit($userId)
    {

        $user = User::find($userId);
        $gymId = gymManager::where('user_id', $userId)->first()->gym_id;
        //dd($gymId);
        //$gymId = $gymMan->gym_id;
        $gym = Gym::where('id', $gymId)->first();
        //dd($gym);
        $cities = City::all();
        $gyms = Gym::all();
        return view('gym-managers.edit', [
            'user' => $user,
            'gyms' => $gyms,
            'cities' => $cities,
            'gym' => $gym

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
}
