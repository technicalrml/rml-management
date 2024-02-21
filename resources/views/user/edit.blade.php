@extends('layout.action')
@section('title',$title)
@section('tabletitle','Added User')

{{--BUTTON--}}
@section('backbutton','view User')
@section('toview',route('viewuser'))

{{--FOR FORMS--}}
@section('valuename',$users->name)
@section('valueemail',$users->email)
@section('valuephone_number',$users->phone_number)
@section('valueaddress',$users->address)
@section('valuepassword',$users->password)

@section('content')
    <form class="user" action="{{ route('updateuser', $users->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                @include('forms.name')
                @include('forms.email')
                @include('forms.phone_number')
                <div hidden>
                    @include('forms.password')
                </div>
            </div>

            <div class="col-md-6">

                {{--                POSITION--}}
                <div class="form-group">
                    <strong><label for="role" class="text-uppercase">Position</label></strong>
                    <select class="form-control form-select" id="role_id" name="role_id" required=""
                            oninvalid="this.setCustomValidity('Please select your position!')"
                            oninput="setCustomValidity('')">
                        @foreach ($role as $roles)
                            <option value="{{ $roles->role_id }}" {{ $users->role_id == $roles->role_id ? 'selected' : '' }}>
                                {{ $roles->role }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{--                GENDER--}}
                <div class="form-group">
                    <strong><label for="gender" class="text-uppercase">Gender</label></strong>
                    <select class="form-control form-select" id="gender" name="gender" required=""
                            oninvalid="this.setCustomValidity('Please select your gender!')"
                            oninput="setCustomValidity('')">
                        <option value="{{$users->gender}}" selected>{{$users->gender}}</option>
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

