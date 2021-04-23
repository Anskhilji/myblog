@extends('frontend.layouts.app')

@section('content')
    <!--Form Column-->
        <div class="col-md-8">
            <div class="accordion" id="accordionExample">
                @forelse($faqs as $key =>$faq)
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link w-100 text-left" type="button"
                                        data-toggle="collapse" data-target="#collapse{{$key}}"
                                        aria-expanded="true" aria-controls="collapse{{$key}}">
                                    {!! $faq->question !!}
                                </button>
                            </h5>
                        </div>

                        <div id="collapse{{$key}}" class="collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="heading{{$key}}" data-parent="#accordionExample">
                            <div class="card-body">
                                {!! $faq->ans !!}
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>No Faqs Available</h3>
                @endforelse
            </div>
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
    <!--End pagewrapper-->


@endsection
