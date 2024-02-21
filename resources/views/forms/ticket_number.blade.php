<div class="form-group">
    <label for="ticket_number" class="text-uppercase"><b>Number Ticket</b></label>
    <input type="number" value="@yield('value_ticket_number')" class="form-control" id="ticket_number" name="ticket_number" placeholder="Enter The ticket number" required=""
           oninvalid="this.setCustomValidity('Please enter the ticket number!')"
           oninput="setCustomValidity('')">
</div>
