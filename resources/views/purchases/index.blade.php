@extends('layouts.app')
@section('third_party_stylesheets')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="text-center mydiv">
    <table id="table_id" class="table table-responsive-md  cell-border compact stripe table-dark my-4 text-dark">
        <thead>
            <tr class="text-white">
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Package Name</th>
                <th>Paid Price</th>
                @can('gym-managers')
                <th>Gym</th>
                @endcan
                @role('Super-Admin')
                <th>City</th>
                @endrole
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>