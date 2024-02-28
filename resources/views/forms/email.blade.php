<div class="form-group">
    <label for="email" class="text-uppercase"><b>email</b></label>
    <input type="email" value="@yield('valueemail')" class="form-control" id="email" name="email" placeholder="Enter The Email" required=""
           oninvalid="this.setCustomValidity('Please enter your email!')"
           oninput="setCustomValidity('')" @yield('valueread')>
</div>
