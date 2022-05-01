@extends('layouts.app')
@section('third_party_stylesheets')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
@endsection
@section('content')
<br><br>
<table id="table_id" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>national_id</th>
            <th>avatar</th>
            <th>is_baned</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@endsection
@section('third_party_scripts')
<script src="{{ mix('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js" defer></script>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('coaches.index') }}"
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'national_id',
                    name: 'national_id',
                },
                {
                    data: 'avatar',
                    name: 'avatar',
                    render: function(data, type, full, meta) {
                        return "<img src=" + data + " width='70' class='img-thumbnail' />";
                    },
                    orderable: false
                },
                {
                    data: 'is_baned',
                    name: 'is_baned',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                },
            ]
        });
    });
</script>
@endsection