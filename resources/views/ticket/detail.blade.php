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
                    {{ $ticket->customer}}
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
                    {{ $ticket->product}}
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
                    {{ $ticket->name}}
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
    <hr>
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('viewprogressticket', $ticket->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i><b> Update Progress</b></a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <a href="" class="btn btn-primary col-md-12 text-left" data-toggle="collapse" data-target="#demo"><i class="fas fa-arrow-alt-circle-right"></i><b> Ticket Updated By User - DateTime</b></a>
        </div>
        <div id="demo" class="col-md-12 collapse"><br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
    </div>
    <br>

@endsection




