<!--Sidebar Side-->
<div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
    <aside class="sidebar default-sidebar right-sidebar">

        <!--Social Widget-->
        <div class="sidebar-widget sidebar-social-widget">
            <div class="sidebar-title">
                <h2>Follow Us</h2>
            </div>
            <ul class="social-icon-one alternate">
                <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li class="g_plus"><a href="#"><span class="fa fa-google-plus"></span></a></li>
                <li class="linkedin"><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
            </ul>
        </div>
        <!--End Social Widget-->

        <!--Category Widget-->
        <div class="sidebar-widget categories-widget">
            <div class="sidebar-title">
                <h2>Categories</h2>
            </div>
            <ul class="cat-list">
                @foreach($categories as $cat)
                <li class="clearfix"><a href="#">{{ $cat->category_name }} <span>(30)</span></a></li>
                @endforeach
            </ul>
        </div>
        <!--End Category Widget-->

    </aside>
</div>
