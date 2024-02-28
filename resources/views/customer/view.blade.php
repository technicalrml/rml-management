@extends('layout.view')
@section('title',$title)
@section('addbutton','customer')
@section('tabletitle','customer')
@section('toaction', route('addcustomer'))

@section('content')
    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr class="bg-primary text-white">
            <th class="text-uppercase">No</th>
            <th class="text-uppercase">Customer ID</th>
            <th class="text-uppercase">Customer</th>
            @if(auth()->user()->role_id == 'RL001'||auth()->user()->role_id == 'RL002')
            <th class="text-uppercase">Action</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach ($customer as $index => $customers)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $customers->customer_id }}</td>
                <td>{{ $customers->customer }}</td>
                @if(auth()->user()->role_id == 'RL001'||auth()->user()->role_id == 'RL002')
                <td style="background-color:#FFFFFF">
                    <a href="{{ route('vieweditcustomer', $customers->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                    <a href="{{ route('deletecustomer', $customers->id) }}" data-id="{{ $customers->id }}" class="btn btn-danger btn-sm btn-delete" id="btn_delete" style="margin:auto;">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
                @endif
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

                var customerId = $(this).data('id');
                var deleteRoute = "{{ route('deletecustomer', ':id') }}".replace(':id', customerId);

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

