@extends('layouts.app')

@section('title') Create @endsection

@section('styles')
<link href=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css” rel=”stylesheet”>

@endsection


@section('content')
<div class="mydiv">
    <form method="POST" action="{{route('sessions.store')}}" class="offset-3">

        @csrf
        <div class="mb-3 col-sm-8">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3 col-sm-8">
            <label for="Day">Day</label>
            <input name="day" id="Day" class="form-control" type="date" />
        </div>

        <div class="mb-3 col-sm-8">
            <label for="start">Start-time</label>
            <input name="start" type="time" class="form-control" />
        </div>

        <div class="mb-3 col-sm-8">
            <label for="finish">finish-time</label>
            <input name="finish" type="time" class="form-control" />
        </div>

        <div class="form-group col-sm-8">
            <label for="exampleFormControlSelect2">Choose Coaches</label>
            <select name="coaches[]" multiple class="form-control" id="exampleFormControlSelect2">
                coaches
                @foreach($coaches as $coach)
                {
                <option value={{$coach->id}}>{{$coach->name}}</option>
                }
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success btn-lg offset-4">Add</button>

    </form>
</div>
@endsection

@section('javascripts')

@endsection
