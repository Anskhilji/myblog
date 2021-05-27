@php
    $home_date = date("Y-m-d");
        $h_views = DB::table("visits")->where("date",$home_date)->first();
        if(is_object($h_views)){
            DB::table('visits')->where('id',$h_views->id)->increment('views',1);
        }else{
            DB::table("visits")->insert(['date' => $home_date, 'views' => 1]);
        }

        $gr = \App\Models\Setting::first();
        $favicon =  (isset($gr->favicon)) ? $gr->favicon : "";
        $logo =  (isset($gr->logo_image)) ? $gr->logo_image : "";
        $ogImage =  (isset($gr->og_image)) ? $gr->og_image : "";
        $address =  (isset($gr->address)) ? $gr->address : "";
        $google_analytics =  (isset($gr->google_analytic)) ? $gr->google_analytic : "";
        $web_master =  (isset($gr->web_master)) ? $gr->web_master : "";
        $bing =  (isset($gr->bing_master)) ? $gr->bing_master : "";

         $metas = \App\Models\Home::where('page_title','home');
         $meta_title = (isset($metas->meta_title))?$metas->meta_title:"My Blog";
         $meta_descp = (isset($metas->meta_descp))?$metas->meta_descp:"My Home Page Meta Description";
         $meta_tags = (isset($metas->meta_tags))?$metas->meta_tags:"My Blog, Blog";
         $post_schema = array();
         $post_og_img = (isset($metas->og_image))?$metas->og_image:$ogImage;

         $segment = request()->segment(1);
         $page_id = get_postid("page_id");
         $post_id = get_postid("post_id");

         if($segment === ""){
             $meta_title = $meta_title;
             $meta_descp = $meta_descp;
             $meta_tags = $meta_tags;

         }elseif($segment === "contact-us"){
                $metas = \App\Models\Home::where('page_title', request()->segment(1))->first();
                 $meta_title = (isset($metas->meta_title))?$metas->meta_title:"My Blog";
                 $meta_descp = (isset($metas->meta_descp))?$metas->meta_descp:"My Home Page Meta Description";
                 $meta_tags = (isset($metas->meta_tags))?$metas->meta_tags:"My Blog, Blog";
                 $post_schema = array();
                 $post_og_img = (isset($metas->og_image))?$metas->og_image:$ogImage;
         }
         elseif($segment === "privacy-policy"){
                $metas = \App\Models\Home::where('page_title', request()->segment(1))->first();
                 $meta_title = (isset($metas->meta_title))?$metas->meta_title:"My Blog";
                 $meta_descp = (isset($metas->meta_descp))?$metas->meta_descp:"My Home Page Meta Description";
                 $meta_tags = (isset($metas->meta_tags))?$metas->meta_tags:"My Blog, Blog";
                 $post_schema = array();
                 $post_og_img = (isset($metas->og_image))?$metas->og_image:$ogImage;
         }
         elseif($segment === "terms-condition"){
                $metas = \App\Models\Home::where('page_title', request()->segment(1))->first();
                 $meta_title = (isset($metas->meta_title))?$metas->meta_title:"My Blog";
                 $meta_descp = (isset($metas->meta_descp))?$metas->meta_descp:"My Home Page Meta Description";
                 $meta_tags = (isset($metas->meta_tags))?$metas->meta_tags:"My Blog, Blog";
                 $post_schema = array();
                 $post_og_img = (isset($metas->og_image))?$metas->og_image:$ogImage;
         }elseif($segment === "faqs"){
                $metas = \App\Models\Home::where('page_title', request()->segment(1))->first();
                 $meta_title = (isset($metas->meta_title))?$metas->meta_title:"My Blog";
                 $meta_descp = (isset($metas->meta_descp))?$metas->meta_descp:"My Home Page Meta Description";
                 $meta_tags = (isset($metas->meta_tags))?$metas->meta_tags:"My Blog, Blog";
                 $post_schema = array();
                 $post_og_img = (isset($metas->og_image))?$metas->og_image:$ogImage;
         }else{
             switch ($page_id) {
                case 1:
                    $r = \App\Models\Category::find($post_id);
                    if(isset($r->id)){
                        $meta_title = $r->meta_title?$r->meta_title:'';
                        $meta_descp = $r->meta_description?$r->meta_description:'';
                        $meta_tags = $r->meta_tags?$r->meta_tags:'';
                        $post_schema = $r->category_schema?json_decode($r->category_schema):'';
                        break;
                    }
                case 2:
                    $r = \App\Models\Post::find($post_id);
                    if(isset($r->id)){
                        $meta_title = $r->meta_title?$r->meta_title:'';
                        $meta_descp = $r->meta_description?$r->meta_description:'';
                        $meta_tags = $r->meta_tags?$r->meta_tags:'';
                        $post_schema = $r->post_schema?json_decode($r->post_schema, true):'';
                        $post_og_img = $r->post_og_image?$r->post_og_image:$ogImage;
                        break;
                    }
                    break;

                    case 3:
                    $r = \App\Models\Author::find($post_id);
                    if(isset($r->id)){
                        $meta_title = $r->meta_title?$r->meta_title:'';
                        $meta_descp = $r->meta_description?$r->meta_description:'';
                        $meta_tags = $r->meta_tags?$r->meta_tags:'';
                        $post_schema = $r->author_schema?json_decode($r->author_schema, true):'';
                        $post_og_img = $r->post_og_image?$r->post_og_image:$ogImage;
                        break;
                    }
                    break;
                default:
                     $meta_title = $meta_title;
                     $meta_descp = $meta_descp;
                     $meta_tags = $meta_tags;
            }
         }
@endphp

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Security-Policy" content="base-uri 'self'">
<meta name="theme-color" content="#fa2964"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{$meta_title}}</title>
<meta name="description" content="{{ $meta_descp }}">
<meta name="keywords" content="{{ $meta_tags }}">
<link rel="icon" href="{{ $favicon }}" type="image/x-icon">

<link rel="canonical" href="{{ url()->current() }}"/>
<meta property="og:url" content="{{ url()->current() }}"/>
<meta property="og:type" content="website" />
<meta property="og:title" content="" />
<meta property="og:description" content="" />
<meta property="og:image" content="{{ $post_og_img }}" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:card" content="photo">
<meta name="twitter:title" content="">
<meta name="twitter:description" content="">
<meta name="twitter:image" content="">
<meta name="csrf-token" content="CA68LUim4UztU2QZfXLUXCHS1LTrANLbhZB21JxO">
{{--<meta name="robots" content="nofollow,noindex">--}}
{!! $web_master !!}
{!! $bing !!}
{!! $google_analytics !!}

@if(count($post_schema) > 0)
    @foreach($post_schema as $schema)
        {!! $schema !!}
    @endforeach
@endif
