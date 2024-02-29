@extends('layout.view')
@section('title',$title)
@section('tabletitle','ticket')

@section('validationbutton')
    @if(auth()->user()->role_id == 'RL001' || auth()->user()->role_id == 'RL005')
        <div class="col-md-6 text-right">
            <a href="{{ route('addticket') }}" class="btn btn-primary text-uppercase"><i class="fas fa-fw fa-plus-square mr-2"></i>Added ticket</a>
        </div>
    @endif
@endsection

@section('content')
    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr class="bg-primary text-white" >
            <th class="text-uppercase">No</th>
            <th class="text-uppercase">Ticket Number</th>
            <th class="text-uppercase">Product</th>
            <th class="text-uppercase">Subject</th>
            <th class="text-uppercase">Customer</th>
            <th class="text-uppercase" style="width: 11%">Status</th>
            <th class="text-uppercase">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($ticket as $index => $tickets)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $tickets->ticket_number }}</td>
                <td>{{ $tickets->product }}</td>
                <td>{{ $tickets->subject }}</td>
                <td>{{ $tickets->customer }}</td>

                <td style="text-align: center;">
                    @if($tickets->status == 'In Progress')
                        <span class="btn btn-success btn-sm"><b>{{ $tickets->status }}</b></span>
                    @else
                        <span class="btn btn-danger btn-sm"><b>{{ $tickets->status }}</b></span>
                    @endif
                </td>
                <td style="background-color:#FFFFFF">
                    <a href="{{ route('viewdetailticket', $tickets->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                    @if(auth()->user()->role_id == 'RL001'||auth()->user()->role_id == 'RL005')
                    <a href="{{ route('vieweditticket', $tickets->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                    @endif
{{--                    <a href="{{ route('deleteticket', $tickets->id) }}" data-id="{{ $tickets->id }}" class="btn btn-danger btn-sm btn-delete" id="btn_delete" style="margin:auto;">--}}
{{--                        <i class="fa fa-trash" aria-hidden="true"></i>--}}
{{--                    </a>--}}
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

                var ticketId = $(this).data('id');
                var deleteRoute = "{{ route('deleteticket', ':id') }}".replace(':id', ticketId);

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

