@extends('layout.action')
@section('title',$title)
@section('tabletitle','Added license')
@section('backbutton','view license')
@section('toview',route('viewlicense'))

@section('content')
    <form method="POST" class="user" action="{{ route('addlicense') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        <strong><label for="customer_id" class="text-uppercase">Customer</label></strong>
                        <select class="select2bs4 form-control form-select" id="customer_id" name="customer_id"
                                required="" oninvalid="this.setCustomValidity('Please select your customers!')"
                                oninput="setCustomValidity('')">
                            <option value="" selected disabled>Chose Customer</option>
                            @foreach ($customer as $customers)
                                <option value="{{ $customers->customer_id }}">{{ $customers->customer }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong><label for="product_id" class="text-uppercase">Product</label></strong>
                        <select class="select2bs4 form-control form-select" id="product_id" name="product_id"
                                required="" oninvalid="this.setCustomValidity('Please select product!')"
                                oninput="setCustomValidity('')">
                            <option value="" selected disabled>Chose Product</option>
                            @foreach ($product as $products)
                                <option value="{{ $products->product_id }}">{{ $products->product }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('forms.varieties_of_products')
                </div>
                <div class="col-md-12">
                    @include('forms.start_date')
                </div>
                <div class="col-md-12">
                    @include('forms.expired_date')
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="type_of_support" class="text-uppercase"><b>Type Of Support</b></label>
                        <select class="select2bs4 form-control form-select" id="type_of_support" name="type_of_support"
                                required="" oninvalid="this.setCustomValidity('Please select type of support!')"
                                oninput="setCustomValidity('')">
                            <option value="" selected disabled>Choose Type Of Support</option>
                            <option value="Standard Support">Standard Support</option>
                            <option value="Premium Support">Premium Support</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong><label for="pic" class="text-uppercase">PIC</label></strong>
                        <select class="select2bs4 form-control form-select" id="pic" name="pic"
                                required="" oninvalid="this.setCustomValidity('Please select pic!')"
                                oninput="setCustomValidity('')">
                            <option value="" selected disabled>Chose PIC</option>
                            @foreach ($user as $users)
                                <option value="{{ $users->user_id }}">{{ $users->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('forms.description')
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

