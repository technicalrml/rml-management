<!DOCTYPE html>
<html lang="en">
@include('partials.header')
<body id="page-top">
<div id="wrapper">
    @include('partials.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('partials.topbar')
            <div class="container-fluid">


            </div>
        </div>
        @include('partials.modal')
        @include('partials.footer')
    </div>
</div>
@include('partials.js')
</body>
</html>
