<?php

namespace App\Http\Controllers;

use App\Http\Requests\GymRequest;
use App\Models\Gym;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\City;
use App\Models\GymManager;
use App\Models\User;

class GymController extends Controller
{

    //----------------------index--------------------//
    public function index()
    {
        $gyms = Gym::all();
        return view('gyms.index', [
            'gyms' => $gyms
        ]);
    }
    //----------------------create--------------------//
    public function create()
    {
        $user = User::where("role", "gym_manager")->get();                            //to return array
        $cities = City::all();
        return view('gyms.create', [
            'user' => $user,
            'cities' => $cities
        ]);
    }
    //----------------------getImageData--------------------//
    public function getImageData($imageData)
    {
        $file = $imageData->file('image');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extenstion;
        $file->move('uploads/gyms/', $filename);
        return $filename;
    }
    //----------------------store--------------------//
    public function store(GymRequest $request)
    {
        $gymData = request()->validated();
        $fileName = $this->getImageData($request);


        $newGym = Gym::create([
            'name' => $gymData['name'],
            'revenue' => 0,
            'image' => $fileName,
            'city_id' => $gymData['city_id']
        ]);

        GymManager::create([
            "user_id" => $gymData['user_id'],
            "gym_id" => $newGym->id
        ]);
        return redirect()->route("gyms.index");
    }
    //----------------------Show--------------------//
    public function show($id)
    {
        $gym = Gym::find($id);
        $managers = Gym::find($id)->gymManager;
        // dd($managers);
        return view('gyms.show', [
            'gym' => $gym,
            'managers' => $managers
        ]);
    }
    //----------------------edit--------------------//
    public function edit($id)
    {
        $gym = Gym::find($id);
        $user = User::where("role", "gym_manager")->get();
        $cities = City::all();
        return view('gyms.edit', [
            'gym' => $gym,
            'user' => $user,
            'cities' => $cities
        ]);
    }
    //----------------------update--------------------//
    public function update($id, GymRequest $request)
    {
        $gym = Gym::find($id);
        $fileName = $this->getImageData($request);
        $updatedGymData = [
            'name' => $request['name'],
            'image' => $fileName,
            'city_id' => $request['city_id'],
        ];
        $updatedGymManagerData = [

            "user_id" => $request['user_id']
        ];
        Gym::where('id', $gym->id)->update($updatedGymData);
        GymManager::where('gym_id', $gym->id)->update($updatedGymManagerData);
        return redirect()->route("gyms.index");
    }
    //----------------------destroy--------------------//
    public function destroy($id)
    {
        Gym::find($id)->delete();
        return redirect()->route("gyms.index");
    }
}
