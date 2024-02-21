@extends('layout.detail')
@section('title',$title)
@section('tabletitle', 'Detail Tickets - ' . $ticket->ticket_number)
@section('backbutton','view ticket')
@section('toview',route('viewticket'))

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">
                    Subject
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-6">
                    {{ $ticket->subject}}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    From
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-6">
                    {{ $ticket->from}}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    Customer
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-6">
                    {{ $ticket->customer_id}}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    Product
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-6">
                    {{ $ticket->product_id}}
                </div>
            </div>
            <br>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">
                    Ticket Open
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-6">
                    {{ \Carbon\Carbon::parse($ticket->ticket_open)->translatedFormat('d F Y') }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    Ticket Close
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-6">
                    @if($ticket->ticket_close != '-')
                        {{ \Carbon\Carbon::parse($ticket->ticket_close)->translatedFormat('d F Y') }}
                    @else
                        Ticket is not closed yet
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    PIC
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-6">
                    {{ $ticket->user_id}}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    Status
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-6">
                    <p>
                        @if($ticket->status == 'In Progress')
                            <span class="btn btn-success btn-sm"><b>{{ $ticket->status }}</b></span>
                        @else
                            <span class="btn btn-danger btn-sm"><b>{{ $ticket->status }}</b></span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection




