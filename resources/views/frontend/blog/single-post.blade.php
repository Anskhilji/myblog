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
			<li><a href="/blog">Blog</a></li>
			<li><a href="">{{ str_replace("-"," ",get_postid("slug"))}}</a></li>
		</ul>
	</div>
       <div class="clearfix"></div>
        <div class="flex main main-2 just-pad">
            @include('front.partials.left-side-bar')
            <div class="right mainblog">
               <div class="single-header bg-white">
                  <h1 class="single-title sec-heading">{{$blog->title}}</h1>
                  <div class="post-category">
                     <p><i class="fa fa-eye pr-2"></i>{{$blog->views}}</p>
                     <p><i class="far fa-calendar-alt pr-2"></i>{{date_create($blog->updated_at)->format('j M Y')}}</p>
                  </div>
                  @php
                    $post_id = get_postid("post_id");
					$ct = table_of_content($blog->content);
					$content = $ct["content"];
					$tc = array("ct"=>$ct["table"]);
					$table = View::make('front/blog/table-of-content', $tc)->render();
					$content = str_replace("[[toc]]", $table, $content);
					$tags = explode(",", $blog->meta_tags);
					$titles = explode(" ", $blog->title);
					$content = do_short_code($content, $post_id,"blogs",$titles, $tags);
					@endphp
					{!! $content !!}
               </div>
               <hr class="wid-for-hun">
               <div class="wid-com">
               		<div id="fb-root"></div>
				<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=605548719882878&autoLogAppEvents=1"></script>
           		<div class="fb-comments" data-href="{{ Request::fullUrl() }}" data-width="100%" data-numposts="5"></div>
               </div>
               
            </div>
        </div>
    </div>
    <script>
         var coll = document.getElementsByClassName("collapsible");
         var i;
         for (i = 0; i < coll.length; i++) {
           coll[i].addEventListener("click", function() {
             this.classList.toggle("active");
             var content = this.nextElementSibling;
             if (content.style.maxHeight){
               content.style.maxHeight = null;
             } else {
               content.style.maxHeight = content.scrollHeight + "px";
             } 
           });
         }
      </script>
      <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e71d3fdd2da4728" data-url="{{ Request::fullUrl() }}"></script>

@include('front.layout.footer')