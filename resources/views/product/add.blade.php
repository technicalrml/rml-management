@extends('layout.action')
@section('title',$title)
@section('tabletitle','Added Product')
@section('backbutton','view product')
@section('toview',route('viewproduct'))

@section('content')
    <form method="POST" class="user" action="{{ route('addproduct') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                @include('forms.product')
            </div>
            <div class="col-md-6">
                @include('forms.support_email')
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

