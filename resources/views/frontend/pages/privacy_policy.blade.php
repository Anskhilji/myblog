@extends('frontend.layouts.app')

@section('content')

    <!--Form Column-->
    <div class="row">
        <div class="col-md-8">
            {!! $privacy_policy->detail !!}
        </div>
        <div class="col-md-4">
            <!--Widget Column-->
            <div class="widget-column ">
                <div class="footer-widget tweets-widget">
                    <div class="sidebar-widget categories-widget">
                        <div class="sidebar-title" style="background-color: #28292D">
                            <h2>Popular Posts</h2>
                        </div>
                        @forelse(\App\Models\Post::where('post_status',1)->orderBy('post_view','desc')->limit(6)->get() as $rp)
                            <article class="widget-post">
                                <figure class="post-thumb"><a href="{{ url($rp->slug.'-'.'2'.$rp->id) }}">
                                        <img class="wow fadeIn animated" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset($rp->post_cover_image) }}" alt="" style="visibility: visible; animation-duration: 2500ms; animation-delay: 0ms; animation-name: fadeIn;"></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                <div class="text"><a href="{{ url($rp->slug.'-'.'2'.$rp->id) }}" style="color: gray;">{{ $rp->post_title }}</a></div>
                                <div class="post-info">{{ $rp->created_at->diffForHumans() }}</div>
                            </article>
                        @empty
                            <h3>No Post Available</h3>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End pagewrapper-->


@endsection
