<div class="form-group">
    <label for="to" class="text-uppercase"><b>to</b></label>
    <input type="email" value="@yield('valueto')" class="form-control" id="to" name="to" placeholder="Enter The to" required=""
           oninvalid="this.setCustomValidity('Please enter your to!')"
           oninput="setCustomValidity('')">
</div>
