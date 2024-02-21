<div class="form-group">
    <label for="customer" class="text-uppercase"><b>Customer</b></label>
    <input type="text" value="@yield('valuecustomer')" class="form-control" id="customer" name="customer" placeholder="Enter The customer" required=""
           oninvalid="this.setCustomValidity('Please enter your customer!')"
           oninput="setCustomValidity('')">
</div>
