<div class="form-group">
    <label for="product" class="text-uppercase"><b>Product</b></label>
    <input type="text" value="@yield('valueproduct')" class="form-control" id="product" name="product" placeholder="Enter The product" required=""
           oninvalid="this.setCustomValidity('Please enter your product!')"
           oninput="setCustomValidity('')">
</div>
