@extends('layout.action')
@section('title',$title)
@section('tabletitle','Added customer')
@section('backbutton','view customer')
@section('toview',route('viewcustomer'))

@section('content')
    <form method="POST" class="user" action="{{ route('addcustomer') }}">
        @csrf
        <div class="col-md-6">
            @include('forms.customer')
        </div>
        <br>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right text-uppercase">SAVE</button><br>
            </div><br>
        </div>
    </form>
@endsection

