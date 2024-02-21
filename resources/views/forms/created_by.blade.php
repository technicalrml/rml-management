<div class="form-group">
    <label for="created_by" class="text-uppercase"><b>Created By</b></label>
    <input type="text" value="{{ auth()->user()->name}}" class="form-control" id="created_by" name="created_by" placeholder="Enter Created By" required=""
           oninvalid="this.setCustomValidity('Please enter the creator!')"
           oninput="setCustomValidity('')">
</div>
