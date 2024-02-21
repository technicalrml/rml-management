@extends('layout.action')
@section('title',$title)
@section('tabletitle','Editing Roles')
@section('backbutton','view role')
@section('toview',route('viewrole'))

@section('valuerole',$role->role)

@section('content')
    <form class="user" method="POST" action="{{ route('updaterole', $role->id) }}">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            @include('forms.role')
        </div>
        <br>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right text-uppercase">Save</button><br>
            </div><br>
        </div>
    </form>
@endsection

