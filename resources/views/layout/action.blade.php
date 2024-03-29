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
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="h3 mb-2 text-gray-800 text-uppercase">@yield('title')</h1>
                    </div>
                    <div class="col-md-6 text-right" @yield('hiddenbutton')>
                        <a href="@yield('toview')" class="btn btn-danger text-uppercase"><i class="fas fa-fw fa-backward mr-2"></i>Back To @yield('backbutton')</a>
                    </div>
                </div>
                <br>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-uppercase">@yield('tabletitle')</h6>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                @include('partials.alert')
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>
</div>
@include('partials.js')
@yield('additionaljs')
</body>
</html>
