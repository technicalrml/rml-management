@extends('layout.view')
@section('title',$title)
@section('addbutton','user')
@section('tabletitle','user')
@section('toaction', route('adduser'))

@section('content')
    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr class="bg-primary text-white">
            <th class="text-uppercase">No</th>
            <th class="text-uppercase">User ID</th>
            <th class="text-uppercase">Name</th>
            <th class="text-uppercase">E-Mail</th>
            <th class="text-uppercase">Phone Number</th>
            <th class="text-uppercase">Position</th>
            <th class="text-uppercase">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user as $index =>$users)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $users->user_id }}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td> {{ $users->phone_number }}</td>
                <td> {{ $users->role }}</td>
                <td style="background-color:#FFFFFF">
                    <a href="{{ route('viewedituser', $users->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                    <a href="{{ route('deleteuser', $users->id) }}" data-id="{{ $users->id }}" class="btn btn-danger btn-sm btn-delete" id="btn_delete" style="margin:auto;">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('additionaljs')
    <script>
        jQuery(document).ready(function($){
            $('.btn-delete').on('click', function(e){
                e.preventDefault();

                var roleId = $(this).data('id');
                var deleteRoute = "{{ route('deleteuser', ':id') }}".replace(':id', roleId);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = deleteRoute;
                    }
                });
            });
        });
    </script>
@endsection

