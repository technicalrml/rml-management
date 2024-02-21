@extends('layout.action')
@section('title',$title)
@section('tabletitle','Added User')
@section('backbutton','view User')
@section('toview',route('viewuser'))

@section('content')
    <form method="POST" class="user" action="{{ route('adduser') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                @include('forms.name')
                @include('forms.email')
                @include('forms.password')
                @include('forms.phone_number')
            </div>

            <div class="col-md-6">

{{--                POSITION--}}
                <div class="form-group">
                    <strong><label for="role" class="text-uppercase">Position</label></strong>
                    <select class="form-control form-select" id="role_id" name="role_id" required=""
                            oninvalid="this.setCustomValidity('Please select your position!')"
                            oninput="setCustomValidity('')">
                        <option value="" selected disabled>Chose Position</option>
                        @foreach ($role as $roles)
                            <option value="{{ $roles->role_id }}">{{ $roles->role }}</option>
                        @endforeach
                    </select>
                </div>

{{--                GENDER--}}
                <div class="form-group">
                    <strong><label for="gender" class="text-uppercase">Gender</label></strong>
                    <select class="form-control form-select" id="gender" name="gender" required=""
                            oninvalid="this.setCustomValidity('Please select your gender!')"
                            oninput="setCustomValidity('')">
                        <option value="" selected disabled>Chose Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                @include('forms.address')
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

