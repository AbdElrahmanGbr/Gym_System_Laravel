@extends('layouts.app')
@section('third_party_stylesheets')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

<div class="card-body d-flex justify-content-center align-items-center flex-column ">

    <img src="../../../user_avatar.png" alt="notFounded" class="w-25 rounded-circle shadow">

    <h3>Gym Name : {{$gym->name}}</h3>
    <h3>Gym Revenue : {{$gym->revenue}}</h3>
    <h3>Gym Manager : </h3>
    <ol>
        @foreach ($managers as $manager )

        <li>
            <h4>{{$manager->name}}</h4>
        </li>

        @endforeach

    </ol>
    <div class="card-tools" style="text-align: center;">
        <a href="{{route('gyms.index')}}" class="btn btn-primary">Back</a>
    </div>
</div>
@endsection