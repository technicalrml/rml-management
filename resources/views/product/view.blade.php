@extends('layout.view')
@section('title',$title)
@section('addbutton','product')
@section('tabletitle','product')
@section('toaction', route('addproduct'))

@section('content')
    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr class="bg-primary text-white">
            <th class="text-uppercase">No</th>
            <th class="text-uppercase">Product ID</th>
            <th class="text-uppercase">Product</th>
            <th class="text-uppercase">Support Email</th>
            <th class="text-uppercase">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($product as $index => $products)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $products->product_id }}</td>
                <td>{{ $products->product }}</td>
                <td>{{ $products->support_email }}</td>
                <td style="background-color:#FFFFFF">
                    <a href="{{ route('vieweditproduct', $products->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                    <a href="{{ route('deleteproduct', $products->id) }}" data-id="{{ $products->id }}" class="btn btn-danger btn-sm btn-delete" id="btn_delete" style="margin:auto;">
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

                var productId = $(this).data('id');
                var deleteRoute = "{{ route('deleteproduct', ':id') }}".replace(':id', productId);

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

