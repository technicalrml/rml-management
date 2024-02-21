@extends('layout.action')
@section('title',$title)
@section('tabletitle','Editing tickets')
@section('backbutton','view ticket')
@section('toview',route('viewticket'))


@section('valuesubject',$ticket->subject)
@section('value_ticket_number',$ticket->ticket_number)
@section('valuefrom',$ticket->from)
@section('valueticket_open',$ticket->ticket_open)

@section('content')
    <form class="user" method="POST" action="{{ route('updateticket', $ticket->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12">
                    @include('forms.ticket_number')
                    @include('forms.subject')
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong><label for="license_id" class="text-uppercase">Customer</label></strong>
                        <select class="select2bs4 form-control form-select" id="license_id" name="license_id"
                                required="" oninvalid="this.setCustomValidity('Please select your customers!')"
                                oninput="setCustomValidity('')">
                            @foreach ($license as $licenses)
                                <option value="{{ $licenses->license_id }}" {{ $ticket->customer_id == $licenses->customer_id ? 'selected' : '' }}>{{ $licenses->customer }} | {{ $licenses->product}} | {{ $licenses->varieties_of_products }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('forms.form')
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    @include('forms.ticket_open')
                </div>
                <div class="col-md-12" hidden>
                    @include('forms.update_by')
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right text-uppercase">Save</button><br>
            </div><br>
        </div>
    </form>
@endsection
@section('additionaljs')
    <script>
        $(document).ready(function() {
            $('#customer_id').on('change', function(){
                var customer_id = $(this).val();
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '/customer-products/' + customer_id,
                    success: function(data){
                        $('#product_id').empty(); // Kosongkan select sebelum menambahkan opsi baru
                        $('#product_id').append('<option value="" selected disabled>Chose Product</option>');
                        $.each(data, function(index, product) {
                            $('#product_id').append('<option value="' + product.product_id + '">' + product.product + '</option>');
                        });
                    }
                });
            });


        });
        $(document).ready(function () {
            $('#product_id').on('change', function(){
                var customer_id = $('#customer_id').val();
                var product_id = $('#product_id').val();
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '/customer-products/' + customer_id + '/' + product_id,
                    success: function(data){
                        if (data.length > 0) {
                            // Jika ada data yang diterima
                            $('input[name="license_id"]').val(data[0].license_id); // Menggunakan kunci yang sesuai
                            console.log(data[0].license_id); // Cetak nilai license_id ke konsol
                        } else {
                            console.log("Data tidak ditemukan atau kosong");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Terjadi kesalahan dalam melakukan permintaan AJAX:", error);
                    }
                });
            });
        });

    </script>

@endsection

