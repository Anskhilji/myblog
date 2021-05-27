<?php
function full_editor(){
    ?>
    <script src="<?php echo route("base_url"); ?>/tinymce/tinymce.min.js"></script>
    <script>
        function full_editor() {
            tinymce.init({
                setup: function (editor) {
                    editor.on("init", function () {
                        editor.shortcuts.remove('ctrl+s');
                    });
                },
                mode: "specific_textareas",
                editor_selector: "oneditor",
                plugins: [
                    "advlist autolink link image lists charmap preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons template paste textcolor"
                ],
                // content_css: "css/content.css",
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media | forecolor backcolor emoticons ",
                theme_advanced_path: false,
                relative_urls: false,
                remove_script_host: false,
                theme_advanced_resizing: true,
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Header 1', block: 'h1'},
                    {title: 'Header 2', block: 'h2'},
                    {title: 'Header 3', block: 'h3'},
                    {title: 'Header 4', block: 'h4'},
                    {title: 'Header 5', block: 'h5'},
                    {title: 'Header 6', block: 'h6'},
                ]
            });
        }
        full_editor();
    </script>
    <?php
}
function tiny_editor(){
    ?>
    <script src="<?php echo route("base_url"); ?>/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            mode : "specific_textareas",
            editor_selector: "tinyeditor",
            menubar:false,
            statusbar: false,
            plugins: [
                'advlist autolink lists link image charmap anchor',
                'searchreplace',
                'media table',
            ],
            toolbar: '| bold italic | alignleft aligncenter alignright alignjustify | bullist numlist| link'
        });
    </script>
    <?php

}

function getCategoryName($id){
    $return = array();
    $cat_array = explode(',',$id);
   foreach ($cat_array as $cat){
      $cat =  DB::table('categories')->where('id',$cat)->first();
      if(empty($cat)){
        return "";
      }else {
          $return[] = $cat->category_name;
      }
   }
   return implode(',',$return);
}


function get_postid($get = "slug") {
    $segment = request()->segment(1);
    $route = $segment;
    $exp = explode("-", $route);
    $last_id = end($exp);
    $page_id = substr($last_id, 0, 1);
    $post_id = substr($last_id, 1, 1000);
    $cat_id = substr($post_id, 0, 3);
    $slug = str_replace("-" . $last_id, "", $route);
    $seg = array(
        "full" => $route,
        "last_id" => $last_id,
        "page_id" => $page_id,
        "post_id" => $post_id,
        "cat_id" => $cat_id,
        "slug" => $slug,
        "type" => ((is_numeric($last_id)) ? "int" : "string"),
    );
    if ($get == "") {
        return "";
    } else {
        return $seg[$get];
    }
}

function trim_words( $text, $num_words = 40, $more = null ) {
    if ($more ==null) {
        $more = '&hellip;';
    }
    $original_text = $text;
    $text = strip_tags( $text );
    $words_array = preg_split( "/[\n\r\t ]+/", $text, $num_words + 1, PREG_SPLIT_NO_EMPTY );
    $sep = ' ';
    if ( count( $words_array ) > $num_words ) {
        array_pop( $words_array );
        $text = implode( $sep, $words_array );
        $text = $text . $more;
    } else {
        $text = implode( $sep, $words_array );
    }
    return $text;
}




function get_green($num , $id){
    $res = DB::table('posts')->select('green_text')->where('id' , $id)->first();
//    dd($res);
    $data = (isset($res->green_text))?json_decode($res->green_text,true):array();
    if (isset($data[$num-1])) {
        $green_text = $data[$num-1];
        $d = view( 'frontend.blog.green', compact( 'green_text' ) );
    }else{
        $d="";
    }
    return $d;
}
function get_red($num , $id){
    $res = DB::table('posts')->select('red_text')->where('id' , $id)->first();
    $data = (isset($res->red_text))?json_decode($res->red_text,true):array();
    if (isset($data[$num-1])) {
        $red_text = $data[$num-1];
        $d = view( 'frontend.blog.red', compact( 'red_text' ) );
    }else{
        $d="";
    }
    return $d;
}
function get_black($num , $id){
    $res = DB::table('posts')->select('black_text')->where('id' , $id)->first();
    $data = (isset($res->black_text))?json_decode($res->black_text,true):array();
    if (isset($data[$num-1])) {
        $black_text = $data[$num-1];
        $d = view( 'frontend.blog.black', compact( 'black_text' ) );
    }else{
        $d="";
    }
    return $d;
}
function _get_faqs($num , $id){
    $res = DB::table('posts')->select('faqs')->where('id' , $id)->first();
    $data = isset($res)? json_decode($res->faqs , true) : array();
    $num = explode("-" , $num);
    $start = $num[0]-1;
    $end = $num[1] - $start;
    $faqs = array_slice($data, $start, $end);
    if (count($faqs) > 0 ) {
        $d = view( 'frontend.blog.faqs', compact( 'faqs' ) );
    }else{
        $d="";
    }
    return $d;
}
function get_related($num,$id){
    $res = DB::table("posts")->whereNotIn('id', [$id])->limit($num)->get();
    if (count($res) > 0 ) {
        $d = view( 'frontend.blog.related', compact( 'res' ) );
    }else{
        $d="";
    }
    return $d;
}
function get_faqs($num , $id){
    $res = DB::table('posts')->select('faqs')->where('id' , $id)->first();
    $data = isset($res)? json_decode($res->faqs , true) : array();
    $num = explode("," , $num);
    $ndata = array();
    foreach ($num as $k => $v) {
        if(array_key_exists($v, $data)){
            $ndata[] = $data[$v-1];
        }
    }
    $faqs = $ndata;
    if (count($faqs) > 0 ) {
        $d = view( 'frontend.blog.faqs', compact( 'faqs' ) );
    }else{
        $d="";
    }
    return $d;
}
function get_ad($num){
    $res = DB::table('web_pages')->select('option_values')->where('option_key' , 'Ads')->first();
    $data = (isset($res->option_values))?json_decode($res->option_values,true):array();
    if (isset($data[$num-1])) {
        $Ads = $data[$num-1];
        $d = view( 'front.blog.Ads', compact( 'Ads' ) );
    }else{
        $d="";
    }
    return $d;
}
function get_gallery($id){
    $res = DB::table('posts')->select('gallery')->where('id' , $id)->first();
    $data = (isset($res->gallery))?json_decode($res->gallery,true):array();
    if (is_array($data)) {
        $galler_images = $data;
        $d = view( 'frontend.blog.images', compact( 'galler_images' ) );
    }else{
        $d="";
    }
    return $d;
}
function do_short_code($content,$id, $tables, $titles="", $tags = array()){
    preg_match_all( '@\[([^<>&/\[\]\x00-\x20=]++)@', $content, $matches );
    $matches = (isset($matches[1])) ? $matches[1] : array();
    foreach($matches as $k=>$v){
        $exp = explode(":", $v);
        $r = "";
        if ($exp[0]=="talk"){
            $r= talk_start($id);
        }elseif ($exp[0]=="end-talk"){
            $r= talk_end($id);
        }elseif ($exp[0]=="green"){
            $e  = (isset($exp[1])) ? $exp[1] : "";
            if (!empty($e) and is_numeric($e)){
                $r= get_green("$e" , $id);
            }
        }elseif ($exp[0]=="red"){
            $e  = (isset($exp[1])) ? $exp[1] : "";
            if (!empty($e) and is_numeric($e)){
                $r= get_red("$e" , $id);

            }
        }elseif ($exp[0]=="Ads"){
            $e  = (isset($exp[1])) ? $exp[1] : "";
            if (!empty($e) and is_numeric($e)){
                $r= get_ad("$e");
            }
        }elseif ($exp[0]=="related"){
            $e  = (isset($exp[1])) ? $exp[1] : "";
            if (!empty($e) and is_numeric($e)){
                $r= get_related("$e",$id);
            }
        }elseif ($exp[0]=="black"){
            $e  = (isset($exp[1])) ? $exp[1] : "";
            if (!empty($e) and is_numeric($e)){
                $r= get_black("$e" , $id);
            }
        }elseif ($exp[0]=="faqs"){
            $e  = (isset($exp[1])) ? $exp[1] : "";
            if (!empty($e) and strpos($e, '-') !== false){
                $r= _get_faqs("$e" , $id);
            }elseif(!empty($e) and strpos($e, ',') !== false){
                $r= get_faqs("$e" , $id);
            }else{
                $r= get_faqs("$e" , $id);
            }
        }elseif ($exp[0]=="gallery"){
            $r= get_gallery($id);
        }
        $content = str_replace("[[$v]]", $r, $content);
    }
    return $content;

}
function talk_start($id){
    $d = "<div class='talk'>";
    return $d;
}
function talk_end($id){
    $d = "</div>";
    return $d;
}
function search_toc_pattren($keyword="", $content=""){
    $pattren = "/([[)($keyword+)(]])(.+)(\[\[\/)($keyword+)(\]\])/";
    preg_match_all($pattren, $content, $matches, PREG_OFFSET_CAPTURE);
    return $matches;
}
function generateRandomString($num){
    return Str::random($num);
}
function table_of_content($content = ""){
    $c_url = url()->current();
    $table = "";
    $pattren = "/([[)(t[0-9]+)(]])(.+)(\[\[\/)(t[0-9]+)(\]\])/";
    $matches = search_toc_pattren("t[0-9]", $content);
    $all_pattren = array();
    if (count($matches[1]) > 0){
        $table.="<ol type'1' class='outer'>";
        foreach($matches[1] as $k=>$v){
            $m = $k+1;
            $open_tag = "[[".$matches[5][$k][0]."]]";
            $close_tag = "[[/".$matches[5][$k][0]."]]";
            $ft = Str::slug($matches[3][$k][0]);
            $span = "<span id='$ft'></span>";
            $content = str_replace($open_tag,$span,$content);
            $content = str_replace($close_tag,"",$content);
            $main = $matches[3][$k][0];
            $ar_main = explode(" ", $main);
            $li_text = "";
            foreach ($ar_main as $ab => $value) {
                $li_text .= (strlen(trim($value)) >3) ? ucwords($value) : $value;
                if ($ab< count($ar_main)) {
                    $li_text .=" ";
                }
            }

            $table.="<li style=''>$m <a href='$c_url#$ft' class='smooth-goto'><span></span>$li_text</a>";

            $st  = $matches[5][$k][0];
            $st  = "$st-s[0-9]";
            $matches_s = search_toc_pattren($st, $content);
            if (count($matches_s[1]) > 0){

                $table .="<ol type='3.1' class='nested-1'>";
                foreach($matches_s[1] as $sk=>$sv){
                    $sks = $sk+1;
                    $open_tag = "[[".$matches_s[5][$sk][0]."]]";
                    $close_tag = "[[/".$matches_s[5][$sk][0]."]]";
                    $ft = Str::slug($matches_s[3][$sk][0]);
                    $span = "<span id='$ft'></span>";
                    $content = str_replace($open_tag,$span,$content);
                    $content = str_replace($close_tag,"",$content);
                    $main = $matches_s[3][$sk][0];
                    $ar_main = explode(" ", $main);
                    $li_text = "";
                    foreach ($ar_main as $ab => $value) {
                        $li_text .= (strlen(trim($value)) >3) ? ucwords($value) : $value;
                        if ($ab< count($ar_main)) {
                            $li_text .=" ";
                        }
                    }
                    //$matches_s[4][$sk][0]."<br>";
                    $table.="<li style='margin-left: 25px'>$m".'.'.$sks." <a href='$c_url#$ft' class='smooth-goto'>".$li_text."</a>";

                    $ct  = $matches_s[5][$sk][0];
                    $ct  = "$ct-c[0-9]";
                    $matches_c = search_toc_pattren($ct, $content);
                    if (count($matches_c[1]) > 0){
                        $table .="<ol type='3.1' class='nested-1'>";
                        foreach($matches_c[1] as $kc=>$vc){
                            $k = $kc + 1;
                            $open_tag = "[[".$matches_c[5][$kc][0]."]]";
                            $close_tag = "[[/".$matches_c[5][$kc][0]."]]";
                            $ft = Str::slug($matches_c[3][$kc][0]);
                            $span = "<span id='$ft'></span>";
                            $content = str_replace($open_tag,$span,$content);
                            $content = str_replace($close_tag,"",$content);
                            $main = $matches_c[3][$kc][0];
                            $ar_main = explode(" ", $main);
                            $li_text = "";
                            foreach ($ar_main as $ab => $value ) {
                                $li_text .= (strlen(trim($value)) >3) ? ucwords($value) : $value;
                                if ($ab< count($ar_main)) {
                                    $li_text .=" ";
                                }
                            }
                            $table.="<li style='margin-left: 40px'>$sks".'.'."$k<a href='$c_url#$ft' class='smooth-goto'>".$li_text."</a></li>";
                        }
                        $table .="</ol>";
                    }
                    $table.="</li>";
                }
                $table.="</ol>";
            }
            $table.="</li>";
        }
        $table.="</ol>";
    }
    return array("content"=>$content, "table"=>$table);
}
function clean_short_code($content = ""){
    // Remove TOC
    $content = str_replace("[[toc]]", "", $content);
    // Remove Table of Content Shortcode
    $content = table_of_content($content);
    $content = $content["content"];
    //Remove Related, download tags
    preg_match_all( '@\[([^<>&/\[\]\x00-\x20=]++)@', $content, $matches );
    $matches = (isset($matches[1])) ? $matches[1] : array();
    foreach($matches as $k=>$v){
        $exp = explode(":", $v);
        $r = "";
        if ($exp[0]=="related"){
            $e = (isset($exp[1])) ? $exp[1] : "";
            if (!empty($e) and is_numeric($e)){
                $r = "";
            }
        }elseif ($exp[0]=="download"){
            $e = (isset($exp[1])) ? $exp[1] : "";
            if (!empty($e) and is_numeric($e)){
                $r = "";
            }
        }elseif ($exp[0]=="ads"){
            $e = (isset($exp[1])) ? $exp[1] : "";
            if (!empty($e) and is_numeric($e)){
                $r = "";
            }
        }
        $content = str_replace("[[$v]]", $r, $content);
    }
    return $content;
}


//function shotCode($id, $content){
//    if(preg_match_all("/\\[+(.*?)\\]/", $content, $matches)){
////         dd($matches[1]);
//        foreach ($matches[1] as $match){
//            $preg_arr = explode(':',$match);
////            dd($preg_arr);
////            $r = '';
//            if (!empty($preg_arr[0])){
//                if($preg_arr[0] == 'green'){
//                    $r = greenBox($id,$preg_arr[1]);
//                }
//            }
//            if (!empty($preg_arr[0])){
//                if($preg_arr[0] == 'red'){
//                    $r = redBox($id,$preg_arr[1]);
//                }
//            }
//
//            if (!empty($preg_arr[0])){
//                if($preg_arr[0] == 'black'){
//                    $r = blackBox($id,$preg_arr[1]);
//                }
//            }
//            if (!empty($preg_arr[0])){
//                if($preg_arr[0] == 'faqs'){
////                    dd($preg_arr[1]);
//                    if(preg_match('/^[0-9- ]+$/D', $preg_arr[1])){
//                        $oneToTwo = explode('-',$preg_arr[1]);
//                        $r = faqsBox($id,$oneToTwo[0],$oneToTwo[1]);
//                    }
//                }
//            }
//            if (!empty($preg_arr[0])){
//                if($preg_arr[0] == 'faqs'){
////                    dd($preg_arr[1]);
//                    if(preg_match('/^[0-9,]+$/', $preg_arr[1])){
//                        $comma_seperated = explode(',', $preg_arr[1]);
////                        dd($comma_seperated);
//                        $r = faqsCommaSeparated($id,$comma_seperated);
//                    }
//                }
//            }
//
//            if (!empty($preg_arr[0])){
//                if($preg_arr[0] == 'related'){
////                    dd($preg_arr[1]);
//                        $r = relatedPostsLinksWithLimit($id,$preg_arr[1]);
//                }
//            }
//
////            if (!empty($preg_arr[0])){
////                if($preg_arr[0] == 'toc'){
//////                    dd($preg_arr[0]);
////
////                    $r = toc($content,$preg_arr[0]);
////                }
////            }
//
//            if (isset($r)){
//                $content = str_replace("[[$match]]", $r, $content);
//            }
////            dd($content);
//        }
//        return $content;
//    }else{
//        return $content;
//    }
//}
//function greenBox($post_id, $box_num){
//    $posts = DB::table('posts')->where('id',$post_id)->first();
//    $json_dcode_green = json_decode($posts->green_text);
//    $value = array_key_exists($box_num-1,$json_dcode_green) ? $json_dcode_green[$box_num-1] : "";
//    if($value){
//       return "<div style='border: 1px solid gray'>
//                    <h4 style='background-color: green; padding: 12px; color: #ffffff; text-align: center'>".$value[0]."</h4>
//                    <div style='padding: 20px'>
//                    ".$value[1]."
//                    </div>
//                </div>";
//    }else{
//        return "";
//    }
//}
//function redBox($post_id, $box_num){
//    $posts = DB::table('posts')->where('id',$post_id)->first();
//    $json_dcode_red = json_decode($posts->red_text);
//    $value = array_key_exists($box_num-1,$json_dcode_red) ? $json_dcode_red[$box_num-1] : "";
//    if($value){
//       return "<div style='border: 1px solid gray'>
//                    <h4 style='background-color: red; padding: 12px; color: #ffffff; text-align: center'>".$value[0]."</h4>
//                    <div style='padding: 20px'>
//                    ".$value[1]."
//                    </div>
//                </div>";
//    }else{
//        return "";
//    }
//}
//function blackBox($post_id, $box_num){
//    $posts = DB::table('posts')->where('id',$post_id)->first();
//    $json_dcode_black = json_decode($posts->red_text);
//    $value = array_key_exists($box_num-1,$json_dcode_black) ? $json_dcode_black[$box_num-1] : "";
//    if($value){
//       return "<div style='border: 1px solid gray'>
//                    <h4 style='background-color: black; padding: 12px; color: #ffffff; text-align: center'>".$value[0]."</h4>
//                    <div style='padding: 20px'>
//                    ".$value[1]."
//                    </div>
//                </div>";
//    }else{
//        return "";
//    }
//}
//function faqsBox($post_id, $start, $box_num){
//    $posts = DB::table('posts')->where('id',$post_id)->first();
//    $faqs = json_decode($posts->faqs);
//    $faqs_arr  = array_slice($faqs, $start-1, $box_num);
//    if (count($faqs_arr) > 0){
//        return view('frontend.layouts.faqs', compact('faqs_arr'));
//    }else{
//        return "";
//    }
//}
//function faqsCommaSeparated($post_id, $randfaqs){
//    $posts = DB::table('posts')->where('id',$post_id)->first();
//    $faqs = json_decode($posts->faqs);
////    dd($faqs);
//    $faqs_arr = array();
//    foreach($faqs as $key => $value){
//        foreach ($randfaqs as $k => $v){
//            if ($key+1 == $v){
//                $faqs_arr[] = $value;
//            }
//        }
//    }
//    if (count($faqs_arr) > 0){
//        return view('frontend.layouts.comma_separated_faqs', compact('faqs_arr'));
//    }else{
//        return "";
//    }
//}
//function relatedPostsLinksWithLimit($post_id,$related){
//    $post = DB::table('posts')->where('id',$post_id)->first();
//
//    $meta_title = explode(' ', $post->meta_title);
//    $meta_tags = explode(',', $post->meta_tags);
////    DB::enableQueryLog();
////    function excape_words(){
//        $rr = array("is", "am", "are", "might", "and", "a", "an", "the", "what", "it", "this", "that", "those", "there", "i", "my", "me", "mine", "for" , "your" ,"you" ,"of", "for" ,"the" ,"there" ,"will" ,"shall","go","who","in" ,"to" ,"?" ,"should" , "why" , "your" , "how" , "with");
////        return $rr;
////    }
//    $check = array_merge($meta_title,$meta_tags);
//    foreach ($check as $key=>$val){
//        $val = strtolower($val);
//        if (in_array($val,$rr)){
//            unset($check[$key]);
//        }
//    }
////    dd($check);
//    $where = array();
//    foreach ($check as $key=>$value){
//        $where[] = "meta_title like '%$value%'";
//        $where[] = "meta_tags like '%$value%'";
//    }
////    dd($sql);
////			$rows = DB::select($sql);
//    $related_posts = array();
//    if(count($where) > 0){
//        $related_posts  = DB::table("posts")->whereRaw("id !='$post_id' and (".implode(" or ", $where).")")->limit($related)->get();
//    }
//
////    dd($related_posts);
////    dd(DB::getQueryLog());
//
//    if (count($related_posts) > 0){
//        return view('frontend.layouts.related_posts_links', compact('related_posts'));
//    }else{
//        return "";
//    }
//}
//function toc($content, $toc){
////    dd($toc);
////    $posts = DB::table('posts')->where('id',$post_id)->first();
//    $post_detail =  $content;
////    dd($post_detail);
//    $toc_res = '';
//    if (preg_match_all("/\[\[t[0-9]+]](.*?)\[\[\/t[0-9]+]]/i", $post_detail, $matches)){
//        $main_heading = $matches[1];
////        dd($main_heading);
//        $toc_res .= '<fieldset>';
//        $toc_res .= '<legend>Table of Content:</legend>';
//        $toc_res .= '<ul>';
//
//        foreach ($main_heading as $km=>$vm){
//            $km = $km+1;
//            $trimmedvm = trim($vm,' ');
//            $vmId = explode(" ",$trimmedvm);
//            $dash= implode("-", $vmId);
//
//            $span = '<span id="'.$dash.$km.'">'.$vm.'</span>';
//            $post_detail = str_replace('[[t'.$km.']]'.$vm.'[[/t'.$km.']]',$span,$post_detail);
////            dd($post_detail);
//
//            $toc_res .= '<li style="list-style:none">
//                                    <a href = "#'.$dash.$km.'"><span>'.$km.' - </span>'.$vm.'</a>';
//            if (preg_match_all("/\[\[t['.$km.']-s[0-9]+]](.*?)\[\[\/t['.$km.']-s[0-9]+]]/i", $post_detail, $matches)){
//                $heading = $matches[1];
//                $toc_res .= '<ul>';
//                foreach ($heading as $headkey=>$headval){
//                    $headk = $headkey+1;
//                    $trimmedhead = trim($headval,' ');
//
//                    $headv = explode(" ",$trimmedhead);
//                    $dash = implode("-", $headv);
////                    dd($headval);
//                    $span = '<span id="'.$dash.$headk.'">'.$headval.'</span>';
//                    $post_detail = str_replace('[[t'.$headk.'-s'.$headk.']]'.$headval.'[[/t'.$headk.'-s'.$headk.']]',$span,$post_detail);
////                    dd($post_detail);
//
//                    $toc_res .= '<li style="list-style:none; margin-left: 40px">
//                                    <a href = "#'.$dash.$headk.'"><span>'.$km.".".$headk.' - </span>'.$headval.'</a>';
//
//                    if (preg_match_all("/\[\[t['.$km.']-s['.$headk.']-c[0-9]+]](.+?)\[\[\/t['.$km.']-s['.$headk.']-c[0-9]+]]/i", $post_detail, $matches)){
//                        $sub_heading = $matches[1];
//                        $toc_res .= '<ul>';
//                        foreach ($sub_heading as $subkey=>$subval){
//                            $subk =$subkey+1;
//
//                            $trimmedVal = trim($subval,' ');
//                            $subv = explode(" ",$trimmedVal);
//                            $dash = implode("-",$subv);
//
//                            $span = '<span id="'.$dash.$subk.'">'.$subval.'</span>';
//                            $post_detail = str_replace('[[t'.$subk.'-s'.$subk.'-c'.$subk.']]'.$subval.'[[/t'.$subk.'-s'.$subk.'-c'.$subk.']]',$span,$post_detail);
//
//                            $toc_res .= '<li style="list-style:none; margin-left: 40px">
//                                            <a href = "#'.$dash.'"><span>'.$headk.".".$subk.' - </span>'.$subval.'</a>
//                                         </li>';
//                        }
//                        $toc_res .= '</ul>';
//                    }
//                }
//                $toc_res .= '</li>';
//                $toc_res .= '</ul>';
//            }
//        }
//
//
//        $toc_res .= '</li>';
//        $toc_res .= '</ul>';
//        $toc_res .= '</fieldset>';
//        $data['toc'] = $toc_res;
//        $data['content'] = $post_detail;
//        return $toc_res;
//    }
//
//}

?>
