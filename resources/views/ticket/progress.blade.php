@extends('layout.action')
@section('title',$title)
@section('tabletitle','Ticket Update Progress')
@section('backbutton','detail ticket')
@section('toview',route('viewdetailticket',$ticket->id))

@section('content')
    <form method="POST" class="user" action="{{ route('updateprogress', $ticket->id) }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="ticket_number" class="text-uppercase"><b>Number Ticket</b></label>
                        <input type="number" value="{{$ticket->ticket_number}}" class="form-control" id="ticket_number" name="ticket_number" readonly>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('forms.to')
                </div>
                <div class="col-md-12">
                    @include('forms.form')
                </div>

            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    @include('forms.update_date')
                </div>
                <div class="col-md-12">
                    <label class="text-uppercase" for="status"><b>Status</b></label>
                    <select class="form-control form-select" id="status" name="status" required=""
                            oninvalid="this.setCustomValidity('Please select your status!')"
                            oninput="setCustomValidity('')">
                        @if($ticket->status == "In Progress")
                            <option value="In Progress" selected>In Progress</option>
                            <option value="Closed">Closed</option>
                        @else
                            <option value="In Progress" >In Progress</option>
                            <option value="Closed" selected>Closed</option>
                        @endif

                    </select>
                    <br>
                </div>
                <div class="col-md-12">
                    @include('forms.description')
                </div>
                <div class="col-md-12" hidden>
                    @include('forms.update_by')
                </div>
                <div class="col-md-12" hidden>
                    <div class="form-group">
                        <input type="text" value="{{$ticket->ticket_id}}" class="form-control" id="ticket_id" name="ticket_id">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right text-uppercase">Update Progress</button><br>
            </div><br>
        </div>
    </form>
@endsection

