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
            <!--Sec Title-->
            <div class="sec-title">
                <h2>Blog Posts</h2>
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

                                <div class="post-date">{{ $post->created_at->diffForHumans() }}</div>
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
