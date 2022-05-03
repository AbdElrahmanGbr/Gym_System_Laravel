<?php

namespace App\Http\Controllers;

use App\Models\TrainingPackage;
use Illuminate\Http\Request;
use App\Models\Gym;

class TrainingPackageController extends Controller
{
    public function index()
    {
        $trainingPackages = TrainingPackage::with('trainingPackageGym')->get();

        if (request()->ajax()) {
            return datatables()->of($trainingPackages)
                ->addColumn('gymName', function (TrainingPackage $trainingPack) {
                    return $trainingPack->trainingPackageGym->name;
                })
                ->addColumn(
                    'action',
                    function ($data) {
                        $button = '<a href="' . route('training-packages.edit', $data->id) . '" class="btn btn-info btn-sm mx-2">Edit</a>';
                        $button .= '<a href="" onClick = "deleteFunc(' . $data->id . ')"class="btn btn-danger btn-sm mx-2">Delete</a>';
                        return $button;
                    }
                )
                ->rawColumns(['action'])->make(true);
        }
        return view('training-packages.index');
    }
    public function destroy(Request $request)
    {
        $training_package = TrainingPackage::where('id', $request->id)->delete();
        return Response()->json($training_package);
    }
}
