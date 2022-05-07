@extends('layouts.app')
@section('third_party_stylesheets')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class=" mydiv">

    <form method="post" action="{{route('gym-managers.update',$user->id)}}" class="row d-flex flex-column justify-content-center align-items-center" enctype="multipart/form-data">
<<<<<<< HEAD
        <<<<<<< HEAD @csrf @method('PUT') <div class="text-center">
            <label for="avatar" class="form-label" role="button">
                <img class="profile-user-img img-fluid img-circle" src="{{asset('images/'. $user->avatar . '')}}" alt="User profile picture">
            </label>
            <input type="file" name="avatar" id="avatar" class="d-none" value="{{$user->avatar}}" accept="image/x-png,image/gif,image/jpeg" />



            =======
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="mb-3 col-sm-6">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="{{$user->name}}" />
            </div>
            <div class="mb-3 col-sm-6">
                <label for="Email" class="form-label">Email</label>
                <input type="email" name="email" id="Email" class="form-control" value="{{$user->email}}" />
            </div>
            <div class="mb-3 col-sm-6">
                <label for="pass" class="form-label">Old Password</label>
                <input type="password" name="oldpassword" id="password" class="form-control" value="" />
            </div>
            <div class="mb-3 col-sm-6">
                <label for="confirm" class="form-label">New Password</label>
                <input type="password" name="password" id="confirm" class="form-control" value="" />
            </div>
            <div class="mb-3 col-sm-6">
                <label for="confirm" class="form-label">Confrim New Password</label>
                <input type="password" name="confirm" id="confirm" class="form-control" value="" />
            </div>
            <div class="mb-3 col-sm-6">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" name="avatar" id="avatar" class="form-control" value="{{$user->avatar}}" />
            </div>
            <div class="mb-3 col-sm-6">
                <label for="national_id" class="form-label">National_id</label>
                <input type="text" name="national_id" id="national_id" class="form-control" value="{{$user->national_id}}" />
            </div>
=======
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="mb-3 col-sm-6">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="{{$user->name}}" />
        </div>
        <div class="mb-3 col-sm-6">
            <label for="Email" class="form-label">Email</label>
            <input type="email" name="email" id="Email" class="form-control" value="{{$user->email}}" />
        </div>
        <div class="mb-3 col-sm-6">
            <label for="pass" class="form-label">Old Password</label>
            <input type="password" name="oldpassword" id="password" class="form-control" value="" />
        </div>
        <div class="mb-3 col-sm-6">
            <label for="confirm" class="form-label">New Password</label>
            <input type="password" name="password" id="confirm" class="form-control" value="" />
        </div>
        <div class="mb-3 col-sm-6">
            <label for="confirm" class="form-label">Confrim New Password</label>
            <input type="password" name="confirm" id="confirm" class="form-control" value="" />
        </div>
        <div class="mb-3 col-sm-6">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" name="avatar" id="avatar" class="form-control" value="{{$user->avatar}}" />
        </div>
        <div class="mb-3 col-sm-6">
            <label for="national_id" class="form-label">National_id</label>
            <input type="text" name="national_id" id="national_id" class="form-control" value="{{$user->national_id}}" />
        </div>
>>>>>>> 3cf4e46f78c067c72f43a1250b3a57df71267ba7


            <div class="mb-3 col-sm-6" id="cityDiv">
                <label for="city" class="form-label">City</label>
                <select name="city" class="form-control" id="city">
                    <option value="" disabled selected hidden>choose a City</option>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}" {{$city->id == $gym->city_id ? "selected" : ""}}>{{$city->name}}</option>
                    @endforeach
                </select>
            </div>

<<<<<<< HEAD
            <div class="mb-3 col-sm-6" id="gymDiv">
                <label for="gym" class="form-label">Gyms</label>
                <select name="gym" class="form-control" id="gym">
                    <<<<<<< HEAD @foreach($gyms as $cityGym) <option value="{{$cityGym->id}}" {{$cityGym->id == $gym->id ? "selected" : ""}}>{{$cityGym->name}}</option>
                        @endforeach
                        <option value="{{$gym->id}}">{{$gym->name}}</option>
                </select>
            </div>

            {{-- <div class="mb-3 col-sm-6">
=======
        <div class="mb-3 col-sm-6" id="gymDiv">
            <label for="gym" class="form-label">Gyms</label>
            <select name="gym" class="form-control" id="gym">
                <option value="{{$gym->id}}">{{$gym->name}}</option>
            </select>
        </div>

        {{-- <div class="mb-3 col-sm-6">
>>>>>>> 3cf4e46f78c067c72f43a1250b3a57df71267ba7
    <label for="ban" class="form-label">IsBaned</label>
    <select name="ban" class="form-control" id="ban">
        <option value="0">No</option>
        <option value="1">Yes</option>
</select>
  </div> --}}
            <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {

<<<<<<< HEAD
                $("#city").change(function() {
                        var cityID = $(this).val();
                        if (cityID) {
                            $.ajax({
                                url: '/getGym/' + cityID,
                                type: "GET",
                                data: {
                                    "_token": "{{ csrf_token() }}"
                                },
                                dataType: "json",
                                success: function(data) {
                                    if (data) {
                                        $('#gym').empty();
                                        $('#gym').append('<option hidden>Choose a Gym</option>');
                                        $.each(data, function(key, gym) {
                                            $('select[name="gym"]').append('<option value="' + gym.id + '">' + gym.name + '</option>');
                                        });
                                    } else {
                                        $('#gym').empty();
                                    }
                                }
=======
        $("#city").change(function() {
            var cityID = $(this).val();

            if (cityID) {
                $.ajax({
                    url: '/getGym/' + cityID,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#gym').empty();
                            $('#gym').append('<option hidden>Choose a Gym</option>');
                            $.each(data, function(key, gym) {
                                $('select[name="gym"]').append('<option value="' + gym.id + '">' + gym.name + '</option>');
>>>>>>> 3cf4e46f78c067c72f43a1250b3a57df71267ba7
                            });
                        } else {
                            $('#gym').empty();
                        }
                    }
<<<<<<< HEAD

                );

                // Interactive Upload Image
                let avatarInput = document.querySelector("input[name='avatar']");
                let avatarImg = document.querySelector('.profile-user-img');
                avatarInput.addEventListener('change', () => previewImage(avatarImg));
</script>
</div>
@endsection
=======
                });
            } else {
                $('#gym').empty();
            }
        });

    });
</script>


@endsection
>>>>>>> 3cf4e46f78c067c72f43a1250b3a57df71267ba7
