@extends('admin.layouts.app')
@section('content')
    @php
        $categories = DB::table('categories')->count();
        $posts = DB::table('posts')->count();
        $post_views = DB::table('posts')->sum('post_view');

    @endphp
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <!-- task, page, download counter  start -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h4 class="text-c-yellow f-w-600">{{ $categories }}</h4>
                                                <h6 class="text-muted m-b-0">Category</h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <i class="feather icon-bar-chart f-28"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h4 class="text-c-green f-w-600">{{ $posts }}</h4>
                                                <h6 class="text-muted m-b-0">Posts</h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <i class="feather icon-file-text f-28"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h4 class="text-c-pink f-w-600">{{ $post_views }}</h4>
                                                <h6 class="text-muted m-b-0">Total Post Views</h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <i class="feather icon-calendar f-28"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- task, page, download counter  end -->


                        </div>



                        <div class="col-xl-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Visitors</h5>
                                    @php
                                        $Extra = new \App\Http\Controllers\Admin\DashboardController;
                                        $views = $Extra->adsViews("current_month");
                                        $views_m = $Extra->adsViews("monthly");
                                        $views_y = $Extra->adsViews("annually");
                                    @endphp
                                    <template class="vw-cr-mn">@json($views)</template>
                                    <template class="vw-cr-yr">@json($views_m)</template>
                                    <template class="vw-cr-an">@json($views_y)</template>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div id="visitor">
                                        <div id="vclear-chart" class="vchartreport">
                                            <canvas id="vlineChart" height="225" style="display: block; width: 483px; height: 225px;" width="483" class="vchartjs-render-monitor"></canvas>
                                        </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
