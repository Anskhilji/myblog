@include('frontend.layouts.header')
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Content Side-->

                @yield('content')


            </div>

        </div>
    </div>
    <!--End Sidebar Page Container-->

@include('frontend.layouts.footer')
