<div class="form-group">
    <label for="update_by" class="text-uppercase"><b>Created By</b></label>
    <input type="text" value="{{ auth()->user()->name}}" class="form-control" id="update_by" name="update_by" placeholder="Enter Update By" required=""
           oninvalid="this.setCustomValidity('Please enter the creator!')"
           oninput="setCustomValidity('')">
</div>
