<div class="form-group">
    <label for="name" class="text-uppercase"><b>name</b></label>
    <input type="text" value="@yield('valuename')" class="form-control" id="name" name="name" placeholder="Enter The Name"  required=""
           oninvalid="this.setCustomValidity('Please enter your name!')"
           oninput="setCustomValidity('')">
</div>
