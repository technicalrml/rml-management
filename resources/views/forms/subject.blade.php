<div class="form-group">
    <label for="subject" class="text-uppercase"><b>Subject</b></label>
    <input type="text" value="@yield('valuesubject')" class="form-control" id="subject" name="subject" placeholder="Enter The subject" required=""
           oninvalid="this.setCustomValidity('Please enter the subject!')"
           oninput="setCustomValidity('')">
</div>
