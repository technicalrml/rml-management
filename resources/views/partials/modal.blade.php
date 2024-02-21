<div class="modal fade" id="@yield('viewdetail')" tabindex="-1" role="dialog" aria-labelledby="@yield('viewdetail')" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h5 class="modal-title text-uppercase" id="@yield('viewdetail')">@yield('titledetail')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="productDetailBody">
                @yield('contentmodal')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
