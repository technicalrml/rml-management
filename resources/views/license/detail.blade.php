@extends('layout.detail')
@section('title',$title)
@section('tabletitle', 'Detail licenses - ' . $license->license_id)
@section('backbutton','view license')
@section('toview',route('viewlicense'))

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">
                    Customer
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-6">
                    @foreach ($customer as $customers)
                        @if($license->customer_id == $customers->customer_id)
                           {{ $customers->customer }}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">
                    Product
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-6">
                    @foreach ($product as $products)
                        @if($license->product_id == $products->product_id)
                            {{ $products->product }}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-1">

                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    Description
                </div>
                <div class="col-md-12">
                    {{$license->description}}
                </div>
            </div>
        </div>
    </div>
    <br><br>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered " id="" width="100%" cellspacing="0">
                <thead>
                    <tr class="bg-primary text-white">
                        <th class="text-uppercase">Varieties Of Products</th>
                        <th class="text-uppercase">Start Date</th>
                        <th class="text-uppercase">Expired Date</th>
                        <th class="text-uppercase">Type Of Support</th>
                        <th class="text-uppercase">PIC</th>
                    </tr>
                </thead>
                <tbody>
                    <td> {{$license->varieties_of_products}}</td>
                    <td> {{$license->start_date}}</td>
                    <td> {{$license->expired_date}}</td>
                    <td> {{$license->type_of_support}}</td>
                    <td>
                        @foreach($user as $users)
                            @if($license->pic == $users->user_id)
                                {{ $users->name }}
                            @endif
                        @endforeach
                    </td>
                </tbody>

            </table>
        </div>
    </div>
    <br>
@endsection




