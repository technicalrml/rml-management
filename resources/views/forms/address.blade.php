
<div class="form-group">
    <label for="address" class="text-uppercase"><b>Address</b></label>
    <textarea class="form-control" placeholder="Enter Your Address" id="address" name="address" rows="4" cols="50" required=""
              oninvalid="this.setCustomValidity('Please enter your address!')"
              oninput="setCustomValidity('')">@yield('valueaddress')</textarea>
</div>

