@extends('layout.action')
@section('title',$title)
@section('tabletitle','Editing products')
@section('backbutton','view product')
@section('toview',route('viewproduct'))

@section('valueproduct',$product->product)
@section('valuesupport_email',$product->support_email)


@section('content')
    <form class="user" method="POST" action="{{ route('updateproduct', $product->id) }}">
        @csrf
        @method('PUT')
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
                <button type="submit" class="btn btn-primary float-right text-uppercase">Save</button><br>
            </div><br>
        </div>
    </form>
@endsection

