<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\City;
use App\Models\Gym;
use App\Models\GymManager;

class GymController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Staff::where('role','gym_manager')->get())
               ->addColumn('action', function ($data) {
                   $button ='<a href="'.route('gym-managers.edit',$data->id).'" class="btn btn-info btn-sm mx-2">Edit</a>';
                   $button .='<a href="javascript:void(0);" onClick = "deleteFunc('.$data->id.')"class="btn btn-danger btn-sm mx-2">Delete</a>';
                   return $button;
               })
               ->rawColumns(['action'])->make(true);
        }
        return view('gym-managers.index');
    }
    public function create()
    {
        dd('@GymController->create');
    }
}
