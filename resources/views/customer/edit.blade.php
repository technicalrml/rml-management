@extends('layout.action')
@section('title',$title)
@section('tabletitle','Editing customers')
@section('backbutton','view customer')
@section('toview',route('viewcustomer'))

@section('valuecustomer',$customer->customer)

@section('content')
    <form class="user" method="POST" action="{{ route('updatecustomer', $customer->id) }}">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            @include('forms.customer')
        </div>
        <br>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right text-uppercase">Save</button><br>
            </div><br>
        </div>
    </form>
@endsection

