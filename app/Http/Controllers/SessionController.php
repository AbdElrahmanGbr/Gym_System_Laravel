<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\GymCoaches;
use App\Models\User;
use App\Models\SessionUser;
use App\DataTables\SessionDataTable;
use App\Http\Requests\SessionRequest;



class SessionController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Session::latest()->get())
                ->addColumn('Coaches', function (Session $session) {
                    $coaches = $session->user->pluck('name'); //extract name keys from data
                    foreach ($coaches as $coach) {
                        return  $coaches->implode(' , ');
                    }
                })

                ->addColumn('action', function ($data) {
                    $button = '<a
                onClick="EditSession(' . $data->id . ')"
                class="edit btn btn-primary mx-4">Edit</a>';

                    $button .= '<a
                onClick="DeleteSession(' . $data->id . ')"
                class="delete btn btn-danger mx-4">Delete</a>';
                    return $button;
                })


                ->rawColumns(array('action')) //for cells have html
                ->make(true);
        }
        return view('sessions.index');
    }

    public function create()
    {
        $coaches = User::all()->where('role', '=', 'coach');
        return view('sessions.create', [
            'coaches' =>$coaches
        ]);
    }


    public function store(SessionRequest $request)
    {
        $requestData = request()->all();

        $dataTimeStart = $requestData['day'] . " " . $requestData['start']; //concat date with time
        $dateTimeFinish = $requestData['day'] . " " . $requestData['finish'];

        $SessionIsExist = Session::where('start_at', '<=', $dataTimeStart)->where('finish_at', '>=', $dateTimeFinish)->exists();
        if (!$SessionIsExist) {
            $session = Session::create([
                'name' => $requestData['name'],
                'start_at' => $dataTimeStart,
                'finish_at' => $dateTimeFinish,
            ]);

            $coaches = $requestData['coaches'];
            $coaches = array_values($coaches);
            $data = User::find($coaches);
            $session->user()->attach($data); //assign coaches to the session


            return redirect()->route('sessions.index');
        } else if ($SessionIsExist) {
            return  redirect()->back()->withErrors(['There is already session at this time :(']);
        }
    }

    public function destroy(Request $request)
    {
        $SomeoneAttend = SessionUser::where('session_id', '=', $request->id)->exists();
        if (!$SomeoneAttend) {
            $session = Session::where('id', $request->id)->delete();
            return (Response()->json($session));
        } else if ($SomeoneAttend) {
            return  redirect();
        }
    }


    public function edit(Request $request)
    {
        $coaches = User::select('name')->where('role', '=', 'coach')->pluck('name');
        $session = Session::find($request->id);
        $output = array(
            'name' => $session->name,
            'start_at' => $session->start_at,
            'finish_at' => $session->finish_at,
            'coaches' => $coaches
        );
        echo json_encode($output);
    }


    public function update(SessionRequest $request)
    {
    }
}
