@include('front.layout.header')
	<div class="section__search" id="menu-search-content">
		<div class="wrapper">
			<div class="search text-align-center">
				@include('front.partials.search')
			</div>
		</div>
   </div>
    <div class="wrapper">
       <div class="breadcrumb">
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/blog">blog</a></li>
			@if(get_postid("page_id")==4)
			@php
				$c = DB::table("blog_category")->where("id",get_postid("post_id"))->first();
				$name = (isset($c->title))?$c->title:"Blog";
			@endphp
			<li><a href="/{{str_slug($c->title)}}-4{{$c->id}}">{{$c->title}}</a></li>
			
			@endif
		</ul>

	</div>
       <div class="clearfix"></div>
        <div class="flex main main-2">
            @include('front.partials.left-side-bar')
           <div class="right mainarticle">
           @if(get_postid("page_id")==4)
           <h1>{{$name}} Posts</h1>
           @else
           <h1>Blog Posts</h1>
           @endif
			<div class="hr"></div>
            <div class="blog">
				@foreach($blogs as $blog)
                    <div class="blogpost">
                        <div class="blogpost-left">
                            <img src="{{$blog->cover_image}}" alt="">
                            <div class="blogpost-hover" style="height: 195.188px;">
                            <a href="{{route("HomeUrl")}}/{{str_slug($blog->title)}}-5{{$blog->id}}">
                                    <div class="blogpost-hover-icon"><i class="fa fa-share"></i></div>
                                </a>
                            </div>
                        </div>
                        <div class="blogpost-right">
                            <div class="blogpost-desc">
                               <a href="{{route("HomeUrl")}}/{{str_slug($blog->title)}}-5{{$blog->id}}" class="h2">{{$blog->title}}</a>
                               @php
                        		$content = clean_short_code(html_entity_decode($blog->content));
                                $content = trim(trim_words( html_entity_decode($content), 35 ));
                               @endphp
                               <a href="{{route("HomeUrl")}}/{{str_slug($blog->title)}}-5{{$blog->id}}" class="p">{!! $content !!}</a>
                            </div>
                            <hr class="hr-dual">
                            <div class="blogpost-footer">
                              <ul>
								<li><div class="blogpost-icon"><i class="far fa-calendar-alt"></i> </div>
								<div class="blogpost-text">{{date_create($blog->updated_at)->format('j M Y')}}</div></li>
								@php
									$m = array();
									if($blog->cat_id !=""){
										$ex = explode (",", $blog->cat_id);
										$m = DB::table("blog_category")->whereIn("id",$ex)->get();
									}
								@endphp
								@foreach($m as $k =>$n)
								<li>
								<div class="blogpost-icon"><i class="fa fa-tag"></i> </div>
								<div class="blogpost-text"><a href="{{route("HomeUrl")}}/{{str_slug($n->title)}}-4{{$n->id}}">{{$n->title}}</a></div>
								</li>
								@endforeach
								
							</ul>
                       		</div>
                        </div>
                    </div>
				@endforeach
            </div>
<!--
            <ul class="pagination">
                <li class="prev"><i class="fa fa-backward"></i></li>
                <li>1</li>
                <li class="active">2</li>
                <li>3</li>
                <li class="next"><i class="fa fa-forward"></i></li>
            </ul>
-->
        </div>
        </div>
    </div>
 
@include('front.layout.footer')