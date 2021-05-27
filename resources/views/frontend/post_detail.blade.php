@extends('frontend.layouts.app')
@section('content')

<?php

//$preg_match = shotCode($post->id,$post->post_detail);
//dd($preg_match);

?>
    <!--Content Side-->
    <div class="content-side col-lg-8 col-md-12 col-sm-12">
        <div class="content">
            <div class="blog-single">
                <div class="inner-box">
                    <div class="upper-box">
                        <ul class="tag-title">
                            @php
                               $cats =  getCategoryName($post->category_id);
                               $comma_sep_cat = explode(',',$cats);

                            @endphp
                            @if(!empty($comma_sep_cat))
                                @foreach($comma_sep_cat as $comma_sep)
                                    <li>{{ $comma_sep }}</li>
                                @endforeach
                                    @endif
                        </ul>
                        <h2>{{ $post->post_title }}</h2>
                        <ul class="post-meta">
                            <li><span class="icon qb-clock"></span>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</li>
                            @if($post->post_view == 0 || $post->post_view == 1)
                                <li><span class="icon qb-eye"></span>{{ $post->post_view ?? 0 }} View</li>
                            @else
                                <li><span class="icon qb-eye"></span>{{ $post->post_view ?? 0 }} Views</li>
                            @endif

                        </ul>
                    </div>
                    <div class="text">
                        @php
                            $post_id = get_postid("post_id");
                            $ct = table_of_content($post->post_detail);
                            $content = $ct["content"];
                            $tc = array("ct"=>$ct["table"]);
                            $table = View::make('frontend/blog/table-of-content', $tc)->render();
                            $content = str_replace("[[toc]]", $table, $content);
                            $tags = explode(",", $post->meta_tags);
                            $titles = explode(" ", $post->post_title);
                            $InternalLinks = new \App\Helpers\InternalLinks;
                             $content = $InternalLinks->building($post_id, $content, $post->internal_tags);
                            $content = do_short_code($content, $post_id,"blogs",$titles, $tags);

                        @endphp
                        {!! $content !!}
                    </div>
                    <!--post-share-options-->
                    <div class="post-share-options d-flex">
                        @if(!empty($post->meta_tags))
                            @php
                                $tags = explode(',', $post->meta_tags);
                            @endphp
                            @foreach($tags as $tag)
                                <div class="tags clearfix">
                                    <a  href="javascript:void(0);" style="pointer-events: none;">{{ $tag ?? '' }}</a>
                                </div>
                            @endforeach
                        @endif

                    </div>

                    <div class="author-box row" id="author-box">
                        <div class="col-sm-2 col-md-3 col-lg-2 px-0 image-col">
                            <img class="author-image"
                                 src="{{ $post->cover_image ? $post->cover_image : asset('frontend/images/no_image.jpg') }}" width="133" height="167" alt="author-image"> </div>
                        <div class="col-sm-10 col-md-9 col-lg-10 auth__desc-col">
                            <div class="authtop-box">
                              <a href="{{ url($post->auth_slug.'-'.'3'.$post->auth_id) }}">
                                  <h4 class="text-lblue">{{ $post->name }}</h4>
                              </a>
                                <ul class="nav author_nav">
                                </ul>
                            </div>
                            <div><strong>{!! $post->detail !!}</strong></div>
                        </div>
                    </div>

                </div>

                <!--Related Posts-->
                @php
                    $cat_arr = explode(',',$post->category_id);
                    $related_articles = array();
                    if(count($cat_arr)>0){
                        foreach ($cat_arr as $k => $v) {
                            $related_articles[] = \App\Models\Post::whereRaw("FIND_IN_SET(?, category_id) > 0", $v)->where('post_status',1)->get();
                        }
                    }
                    $xxx = array();
                    if (count($related_articles)> 0 ){
                        foreach ($related_articles as $kkk){
                            if(!empty($kkk)){
                                foreach ($kkk as $sss){
                                    $xxx[] = $sss;
                                }
                            }
                        }
                    }
                    $xxx = collect($xxx);
                    $xxx = $xxx->unique();
                    $xxx = $xxx->whereNotIn('id',get_postid('post_id'));
                @endphp
                @if(count($xxx) > 0)
                <div class="related-posts">
                    <div class="sec-title">
                        <h2>Related Articles</h2>
                    </div>
                    <div class="related-item-carousel owl-carousel owl-theme">
                        <!--News Block Two-->
                        @foreach($xxx as $v)
                                <div class="news-block-two small-block">
                                    <div class="inner-box">
                                        <div class="image">
                                            <a href="{{ url($v->slug.'-'.'2'.$v->id) }}" ><img src="{{ $v->post_cover_image }}" width="237" height="148" alt="" /></a>
                                        </div>
                                        <div class="lower-box">
                                            <h3><a href="{{ url($v->slug.'-'.'2'.$v->id) }}">{{ $v->post_title }}</a></h3>
                                            <ul class="post-meta">
                                                <li><span class="icon fa fa-clock-o"></span>{{ $v->created_at->format('D-m-Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        @endforeach

                    </div>
                </div>
                @endif



            </div>
        </div>
    </div>


    <!--Sidebar Side-->
@include('frontend.layouts.aside')


@endsection
