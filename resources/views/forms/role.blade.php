<div class="form-group">
    <label for="role" class="text-uppercase"><b>Role</b></label>
    <input type="text" value="@yield('valuerole')" class="form-control" id="role" name="role" placeholder="Enter The Role" required=""
           oninvalid="this.setCustomValidity('Please enter your role!')"
           oninput="setCustomValidity('')">
</div>
