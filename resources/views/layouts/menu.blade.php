@php
$managerRole = Auth::user()->role;
if($managerRole == 'coach') {
$path = "coaches";
$route = "coaches.index";
} else {
$path = "/";
$route = "home";
}
@endphp
<li class="nav-item">
    <a href="#" class="nav-link bg-white">
        <i class="nav-icon  fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
@yield('menubar')
<!-- @if(Auth::user()->hasRole('Super-Admin')) -->
<!--Users Tab-->
<li class="nav-item has-treeview">
    <a href=".multi-collapse" class="nav-link bg-warning text-white" data-toggle="collapsing" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
        <i class="nav-icon fas fa fa-user"></i>
        <p>
            Users
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link active  multi-collapse" id="multiCollapseExample1">
                <i class="far fa-circle nav-icon"></i>
                <p>List Users</p>
            </a>
        </li>
    </ul>
</li>

<!--Cities Tab-->
<li class="nav-item has-treeview">
    <a href=".multi-collapse" class="nav-link bg-danger text-white" data-toggle="collapsing" aria-expanded="false" aria-controls="CollapseExample1">
        <i class="nav-icon fas fa fa-building"></i>
        <p>
            Cities
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('cities.index') }}" class="nav-link active  multi-collapse" id="CollapseExample1">
                <i class="far fa-circle nav-icon"></i>
                <p>List Cities</p>
            </a>
        </li>
    </ul>
</li>
<!--City Manager Tab-->
<li class="nav-item has-treeview">
    <a href=".multi-collapse" class="nav-link active text-white" data-toggle="collapsing" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
        <i class="nav-icon fas fa fa-user"></i>
        <p>
            City Managers
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('city-managers.index') }}" class="nav-link active  multi-collapse" id="multiCollapseExample1">
                <i class="far fa-circle nav-icon"></i>
                <p>List City Managers</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('city-managers.create') }}" class="nav-link active multi-collapse" id="multiCollapseExample2">
                <i class="far fa-circle nav-icon"></i>
                <p>Add City Manager</p>
            </a>
        </li>
    </ul>
</li>
<!--Coaches tab-->
<li class="nav-item has-treeview">
    <a href=".multi-collapse" class="nav-link bg-purple " data-toggle="collapsing" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
        <i class="nav-icon fas fa fa-users"></i>
        <p>
            Coaches
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('coaches.index') }}" class="nav-link active  multi-collapse" id="multiCollapseExample1">
                <i class="far fa-circle nav-icon"></i>
                <p>List Coaches</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('coaches.create')}}" class="nav-link active multi-collapse" id="multiCollapseExample2">
                <i class="far fa-circle nav-icon"></i>
                <p>Add a Coach</p>
            </a>
        </li>
    </ul>
</li>

<!-- @endif -->
@if(Auth::user()->hasRole('city_manager') || Auth::user()->hasRole('Super-Admin') )
<!--GYm Managers Tab-->
<li class="nav-item has-treeview">
    <a href=".multi-collapse" class="nav-link bg-success" data-toggle="collapsing" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
        <i class="nav-icon fas fa fa-user"></i>
        <p>
            Gym Managers
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('gym-managers.index') }}" class="nav-link active  multi-collapse" id="multiCollapseExample1">
                <i class="far fa-circle nav-icon"></i>
                <p>List Gym Managers</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('gym-managers.create') }}" class="nav-link active multi-collapse" id="multiCollapseExample2">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Gym Manager</p>
            </a>
        </li>
    </ul>
</li>
<!--Gyms Tab-->
<li class="nav-item has-treeview">
    <a href=".multi-collapse" class="nav-link bg-black text-white" data-toggle="collapsing" aria-expanded="false" aria-controls="CollapseExample1">
        <i class="nav-icon fas fa fa-gg"></i>
        <p>
            Gyms
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('gyms.index') }}" class="nav-link active  multi-collapse" id="CollapseExample1">
                <i class="far fa-circle nav-icon"></i>
                <p>List Gyms</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('gyms.create')}}" class="nav-link active multi-collapse" id="multiCollapseExample2">
                <i class="far fa-circle nav-icon"></i>
                <p>Create new Gym</p>
            </a>
        </li>
    </ul>
</li>
@endif

@if( Auth::user()->hasRole('normal_user'))
<!--Training Packages Tab-->
<li class="nav-item has-treeview">
    <a href=".multi-collapse" class="nav-link bg-secondary " data-toggle="collapsing" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
        <i class="nav-icon fas fa fa-tags"></i>
        <p>
            Training Packages
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('training-packages.index') }}" class="nav-link active  multi-collapse" id="multiCollapseExample1">
                <i class="far fa-circle nav-icon"></i>
                <p>List Packages</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('stripe.post')}}" class="nav-link active multi-collapse" id="multiCollapseExample2">
                <i class="far fa-circle nav-icon"></i>
                <p>Buy a training Package</p>
            </a>
        </li>
    </ul>
</li>
@endif

@if(Auth::user()->hasRole('city_manager') || Auth::user()->hasRole('Super-Admin') || Auth::user()->hasRole('gym_manager'))
<!--Training Packages Tab-->
<li class="nav-item has-treeview">
    <a href=".multi-collapse" class="nav-link bg-secondary " data-toggle="collapsing" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
        <i class="nav-icon fas fa fa-tags"></i>
        <p>
            Training Packages
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('training-packages.index') }}" class="nav-link active  multi-collapse" id="multiCollapseExample1">
                <i class="far fa-circle nav-icon"></i>
                <p>List Packages</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('stripe.post')}}" class="nav-link active multi-collapse" id="multiCollapseExample2">
                <i class="far fa-circle nav-icon"></i>
                <p>Buy a training Package</p>
            </a>
        </li>
    </ul>
</li>
<!--Sessions Tab-->
<li class="nav-item has-treeview">
    <a href=".multi-collapse" class="nav-link bg-cyan text-white" data-toggle="collapsing" aria-expanded="false" aria-controls="CollapseExample1">
        <i class="nav-icon fas fa fa-child"></i>
        <p>
            Sessions
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('sessions.index') }}" class="nav-link active  multi-collapse" id="CollapseExample1">
                <i class="far fa-circle nav-icon"></i>
                <p>List Sessions</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('sessions.create')}}" class="nav-link active multi-collapse" id="multiCollapseExample2">
                <i class="far fa-circle nav-icon"></i>
                <p>Create new Session</p>
            </a>
        </li>
    </ul>
</li>
<!--Revenue tab-->
<li class="nav-item has-treeview">
    <a href=".multi-collapse" class="nav-link bg-yellow " data-toggle="collapsing" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
        <i class="nav-icon fas fa fa-calculator"></i>
        <p>
            Revenue
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('revenue.show') }}" class="nav-link active  multi-collapse" id="multiCollapseExample1">
                <i class="far fa-circle nav-icon"></i>
                <p>Show Revenue</p>
            </a>
        </li>
    </ul>
</li>
<!--Attendance tab-->
<li class="nav-item has-treeview">
    <a href=".multi-collapse" class="nav-link bg-pink " data-toggle="collapsing" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
        <i class="nav-icon fas fa fa-check"></i>
        <p>
            Attendance
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('attendances.index') }}" class="nav-link active  multi-collapse" id="multiCollapseExample1">
                <i class="far fa-circle nav-icon"></i>
                <p>Show Attendance</p>
            </a>
        </li>
    </ul>
</li>
<!--purchases history-->
<li class="nav-item">
    <a href="{{ route('purchases.index') }}" class="nav-link bg-white">
        <i class="nav-icon  fas fa  fa-credit-card"></i>
        <p>purchases history</p>
    </a>
</li>


@endif


@if( Auth::user()->hasRole('coach'))
<li class="nav-item">
    <a href="{{route('coaches.profile', ['id' => Auth::user()->id])}}" class="nav-link {{Request::is('coaches/profile/show') ? 'active' : ''}}">
        <i class="nav-icon fas fa-user"></i>
        <p>Profile</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('sessions.index', ['id' => Auth::user()->id])}}" class="nav-link {{Request::is('/sessions') ? 'active' : ''}}">
        <i class="nav-icon fas fa-calendar-check"></i>
        <p>Sessions</p>
    </a>
</li>
@endif
<li class="w-100">
    <div class="accordion w-100" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Home</p>
            </a>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
              Gyms
            </button>
          </h2>
          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
               <strong class="text-danger">
                  
                           <a href="{{ route('gyms.create') }}" class=" {{ Request::is('gyms.create') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <span>Add GYM</span>
                           </a>
                           <a href="{{ route('gyms.index') }}" class="nav-link {{ Request::is('gyms.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>ListGyms</p>
                           </a>                   
            </strong> 
            </div>
          </div>
        </div>
      </div>
 </li>
