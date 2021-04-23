<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public $months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
    function adsViews($type = "current_month"){
        $vw = array();
        $new = array(
            "labels" => array(),
            "data1" => array(),
        );
        $adsViewsSum = DB::table("visits")->get();
        $adsViewsSum = collect($adsViewsSum);
        if ($type=="current_month" or $type==""){
            $date = date("Y-m");
            $days = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
            for($n=1; $n<=$days; $n++){
                if($n<10){
                    $date = date("Y-m")."-0$n";
                }else{
                    $date = date("Y-m")."-$n";
                }
                $hm = $adsViewsSum->where("date",$date)->sum("views");

                $new["labels"][] = $n." ".date("M");
                $new["data1"][] = $hm;
            }

        }elseif($type=="monthly"){
            for($n=1; $n<=12; $n++){
                if($n < 10){
                    $date = date("Y")."-0$n";
                }else{
                    $date = date("Y")."-$n";
                }

                $date = (string) $date;
                $hm = $adsViewsSum->filter(function ($item) use ($date) {
                    return false !== strpos($item->date, $date);
                });
                $hm = $hm->sum("views");
                $new["labels"][] = date("M y", strtotime($date));
                $new["data1"][] = $hm;
            }
        }elseif($type == "annually"){
            for($n=2019; $n<=2030; $n++){
                $date = (string) $n;
                $hm = $adsViewsSum->filter(function ($item) use ($date) {
                    return false !== strpos($item->date, $date);
                });
                $hm = $hm->sum("views");
                $new["labels"][] = $n;
                $new["data1"][] = $hm;
            }
        }

        return $new;
    }
}
