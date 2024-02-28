@extends('layout.view')
@section('title',$title)
@section('addbutton','license')
@section('tabletitle','license')
@section('toaction', route('addlicense'))
@section('viewdetail','viewlicensedetail')
@section('titledetail','License Detail')

@section('content')
    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr class="bg-primary text-white">
            <th class="text-uppercase">No</th>
            <th class="text-uppercase">License ID</th>
            <th class="text-uppercase">Product</th>
            <th class="text-uppercase">Customer</th>
            <th class="text-uppercase">Start Date</th>
            <th class="text-uppercase">Expired Date</th>
            <th class="text-uppercase">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($license as $index => $licenses)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $licenses->license_id }}</td>
                <td>{{ $licenses->product }} - {{ $licenses->varieties_of_products }}</td>
                <td>{{ $licenses->customer }}</td>
                @if($licenses->start_date=="")
                    <td>-</td>
                @else
                    <td> {{ \Carbon\Carbon::parse($licenses->start_date)->translatedFormat('d F Y') }}</td>
                @endif
                @if($licenses->start_date=="")
                    <td>-</td>
                @else
                    <td> {{ \Carbon\Carbon::parse($licenses->expired_date)->translatedFormat('d F Y') }}</td>
                @endif
                <td style="background-color:#FFFFFF">
                    <a href="{{ route('viewdetaillicense', $licenses->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                    @if(auth()->user()->role_id == 'RL001'||auth()->user()->role_id == 'RL005')
                    <a href="{{ route('vieweditlicense', $licenses->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                    <a href="{{ route('deletelicense', $licenses->id) }}" data-id="{{ $licenses->id }}" class="btn btn-danger btn-sm btn-delete" id="btn_delete" style="margin:auto;">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    @endif
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

                var licenseId = $(this).data('id');
                var deleteRoute = "{{ route('deletelicense', ':id') }}".replace(':id', licenseId);

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

