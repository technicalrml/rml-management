<div class="form-group">
    <label for="phone_number" class="text-uppercase"><b>Phone Number</b></label>
    <input type="number" value="@yield('valuephone_number')" class="form-control" id="phone_number" name="phone_number" placeholder="Enter The Phone Number"  required=""
           oninvalid="this.setCustomValidity('Please enter your phone number!')"
           oninput="setCustomValidity('')">
</div>
