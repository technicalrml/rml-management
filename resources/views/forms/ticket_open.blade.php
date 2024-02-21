<div class="form-group">
    <label for="ticket_open" class="text-uppercase"><b>Ticket Open</b></label>
    <input type="date" class="form-control" id="ticket_open" value="@yield('valueticket_open')" name="ticket_open" required=""
           oninvalid="this.setCustomValidity('Please select start date!')"
           oninput="setCustomValidity('')">
</div>
