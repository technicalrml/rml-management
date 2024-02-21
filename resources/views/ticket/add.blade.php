@extends('layout.action')
@section('title',$title)
@section('tabletitle','Added ticket')
@section('backbutton','view ticket')
@section('toview',route('viewticket'))


@section('content')
    <form method="POST" class="user" action="{{ route('addticket') }}">
        @csrf
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
                            <option value="" selected disabled>Chose Customer</option>
                            @foreach ($license as $licenses)
                                <option value="{{ $licenses->license_id }}">{{ $licenses->customer }} | {{ $licenses->product}} | {{ $licenses->varieties_of_products }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    @include('forms.form')
                </div>
                <div class="col-md-12">
                    @include('forms.ticket_open')
                </div>
                <div class="col-md-12" hidden>
                    @include('forms.created_by')
                </div>
            </div>
        </div>

        <br>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right text-uppercase">SAVE</button><br>
            </div><br>
        </div>
    </form>
@endsection


