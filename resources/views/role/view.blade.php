@extends('layout.view')
@section('title',$title)
@section('addbutton','role')
@section('tabletitle','role')
@section('toaction', route('addrole'))

@section('content')
    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr class="bg-primary text-white">
            <th class="text-uppercase">No</th>
            <th class="text-uppercase">Role ID</th>
            <th class="text-uppercase">Position</th>
            <th class="text-uppercase">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($role as $index => $roles)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $roles->role_id }}</td>
                <td>{{ $roles->role }}</td>
                <td style="background-color:#FFFFFF">
                    <a href="{{ route('vieweditrole', $roles->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                    <a href="{{ route('deleterole', $roles->id) }}" data-id="{{ $roles->id }}" class="btn btn-danger btn-sm btn-delete" id="btn_delete" style="margin:auto;">
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
                var deleteRoute = "{{ route('deleterole', ':id') }}".replace(':id', roleId);

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

