<div class="form-group">
    <label for="description" class="text-uppercase"><b>Description</b></label>
    <textarea class="form-control" placeholder="Enter Your Description" id="description" name="description" rows="4" cols="50" required=""
              oninvalid="this.setCustomValidity('Please enter your description!')"
              oninput="setCustomValidity('')">@yield('valuesdescription')</textarea>
</div>
