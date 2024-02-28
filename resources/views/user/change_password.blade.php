@extends('layout.action')
@section('title',$title)
@section('tabletitle','Change Password')

{{--BUTTON--}}
@section('backbutton','view User')
@section('toview',route('viewuser'))
@section('valueread','readonly')
@section('hiddenbutton','hidden')


{{--FOR FORMS--}}

@section('content')
        <form class="user" action="{{ route('changepassword', $users->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                @include('forms.password')
                <div class="form-group">
                    <label for="password" class="text-uppercase"><b>confirm password</b></label>
                    <input type="password" value="" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter The Confirm Password"  required=""
                           oninvalid="this.setCustomValidity('Please enter your password!')"
                           oninput="setCustomValidity('')">
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right text-uppercase">Update Password</button><br>
            </div><br>
        </div>
    </form>
@endsection

