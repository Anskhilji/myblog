<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Author;
use App\Models\Post;
use DB;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    //
	// Generate Dynamic side map
	private $links = array();
	private $home = "";
	public function __construct()
    {
		$this->home  = route("base_url")."/";
    }

	function _commonLinks(){
		$this->links =array(
			["url"=>$this->home, "priority" => "1.0", "frequency"=>"Daily"],
			["url"=>$this->home."contact-us", "priority" => "0.8", "frequency"=>"Daily"],
			["url"=>$this->home."privacy-policy", "priority" => "0.8", "frequency"=>"Daily"],
			["url"=>$this->home."terms-condition", "priority" => "0.8", "frequency"=>"Daily"],
			["url"=>$this->home."faqs", "priority" => "0.8", "frequency"=>"Daily"],
		);
	}

    function posts(){
        $posts = Post::all();

        foreach($posts as $k=>$v){
            $link = $v->slug."-2".$v->id;
            $lk = array(
                "url" => $this->home.$link, "priority" => "0.5", "frequency"=>"Daily"
            );
            $this->links[] = $lk;
        }
    }

    function category(){
        $category = Category::all();

        foreach($category as $k=>$v){
            $link = $v->slug."-1".$v->id;
            $lk = array(
                "url" => $this->home.$link, "priority" => "0.5", "frequency"=>"Daily"
            );
            $this->links[] = $lk;
        }
    }
    function author(){
        $author = Author::all();

        foreach($author as $k=>$v){
            $link = $v->slug."-3".$v->id;
            $lk = array(
                "url" => $this->home.$link, "priority" => "0.5", "frequency"=>"Daily"
            );
            $this->links[] = $lk;
        }
    }


    function _common(){
		$this->_commonLinks();
        $this->posts();
        $this->category();
        $this->author();

	}

	function _run(){
		$this->_common();

		header('Content-Type: text/xml');
		echo '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="'.$this->home.'master/sitemap.xsl"?>';
		echo "\n";
		echo '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		echo "\n";
		foreach ($this->links as $link) {
			echo "\t<url>\n";
			echo "\t\t<loc>" . htmlentities($link['url']) . "</loc>\n";
			//echo "\t\t<lastmod>{$link['lastmod']}</lastmod>\n";
			echo "\t\t<changefreq>{$link['frequency']}</changefreq>\n";
			echo "\t\t<priority>{$link['priority']}</priority>\n";
			echo "\t</url>\n";
		}
		echo '</urlset>';
		exit;
	}
}
