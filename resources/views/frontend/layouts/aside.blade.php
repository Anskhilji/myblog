<!--Sidebar Side-->

<div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
    <aside class="sidebar default-sidebar right-sidebar">

        <!--Social Widget-->
        <div class="sidebar-widget sidebar-social-widget">
            <div class="sidebar-title">
                <h2>Share with</h2>
            </div>
            <ul class="social-icon-one alternate">
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
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
                    @php
                        $post_count = \App\Models\Post::whereRaw("FIND_IN_SET(?, category_id) > 0", $cat->id)->where('post_status',1)->count();
                    @endphp
                    <li class="clearfix">
                    <a href="{{ url($cat->slug.'-'.'1'.$cat->id) }}">{{ $cat->category_name }} <span>({{ $post_count }})</span></a>
                </li>
                @endforeach
            </ul>
        </div>
        <!--End Category Widget-->

    </aside>
</div>
