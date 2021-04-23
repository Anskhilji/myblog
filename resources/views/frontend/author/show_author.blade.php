@extends('frontend.layouts.app')
<style>
    .page-item.active .page-link{
        background-color: #FA2964 !important;
        border-color: #FA2964 !important;
    }

</style>
@section('content')
    <div class="content-side col-lg-8 col-md-12 col-sm-12">
        <div class="content">
{{--            <div class="author-box row" id="author-box">--}}
{{--                <div class="col-sm-2 col-md-3 col-lg-2 px-0 image-col">--}}
{{--                    <img class="author-image" src="{{ !empty($author->cover_image) ? $author->cover_image : asset('frontend/images/no_image.jpg') }}" alt="author-image"> </div>--}}
{{--                <div class="col-sm-10 col-md-9 col-lg-10 auth__desc-col">--}}
{{--                    <div class="authtop-box">--}}
{{--                        <a href="{{ url($author->auth_slug.'-'.'3'.$author->auth_id) }}">--}}
{{--                            <h4 class="text-lblue">{{ $author->name }}</h4>--}}
{{--                        </a>--}}
{{--                        <ul class="nav author_nav">--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div><strong>{!! $author->detail !!}</strong></div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!--Sec Title-->
            <div class="sec-title">
                <h2>Author Related Posts</h2>
            </div>
            <div class="row clearfix">
                <!--News Block One-->
                @forelse($posts as $post)
                    <div class="news-block-one col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <a href="{{ url($post->slug.'-'.'2'.$post->id) }}" rel="nofollow noopener"><img src="{{ asset($post->post_cover_image) }}" alt="{{ $post->post_title }}" style="height: 230px" /></a>
                            </div>
                            <div class="lower-box">
                                <h3><a href="{{ url($post->slug.'-'.'2'.$post->id) }}" rel="nofollow noopener">{{ $post->post_title }}</a></h3>

                                <div class="post-date">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</div>
                                <div class="text"> {!! trim_words($post->post_detail) !!}</div>
                                <a href="{{ url($post->slug.'-'.'2'.$post->id) }}" target="_blank" rel="nofollow noopener" class="read-more">Read More <span class="arrow ion-ios-arrow-thin-right"></span></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1>No Post Available</h1>
            @endforelse
            <!--End News Block-->
            </div>
        </div>
        <!-- Styled Pagination -->
        {{ $posts->links() }}
    </div>
    @include('frontend.layouts.aside')

@endsection
