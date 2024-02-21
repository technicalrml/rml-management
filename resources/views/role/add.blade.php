@extends('layout.action')
@section('title',$title)
@section('tabletitle','Added Role')
@section('backbutton','view role')
@section('toview',route('viewrole'))

@section('content')
    <form method="POST" class="user" action="{{ route('addrole') }}">
        @csrf
        <div class="col-md-6">
            @include('forms.role')
        </div>
        <br>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right text-uppercase">SAVE</button><br>
            </div><br>
        </div>
    </form>
@endsection

