<div class="form-group">
    <label for="password" class="text-uppercase"><b>password</b></label>
    <input type="password" value="@yield('valuepassword')" class="form-control" id="password" name="password" placeholder="Enter The Password"  required=""
           oninvalid="this.setCustomValidity('Please enter your password!')"
           oninput="setCustomValidity('')">
</div>
