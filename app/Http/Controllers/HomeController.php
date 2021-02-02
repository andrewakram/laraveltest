<?php

namespace App\Http\Controllers;

use App\Models\CaptinInfo;
use App\Models\Category;
use App\Models\Country;
use App\Models\Notification;
use App\Models\Review;
use App\Models\Shop_detail;
use App\Models\Offer;
use App\Models\Trip;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $drivers=CaptinInfo::count();
        $users=User::where("is_captin",0)->count();
        $urgentTrips=Trip::where("type","urgent")->count();
        $scheduledTrips=Trip::where("type","scheduled")->count();
        $nots=Notification::where('trip_id',0)->count();
        $countries=Country::count();

        $users_charts = DB::SELECT("select id,count(*) as count,
            date(created_at) as date from users
            WHERE  `is_captin`=0 AND date(created_at) >= DATE(NOW()) - INTERVAL 7 DAY GROUP BY date(created_at),id");

        $shops_charts = DB::SELECT("select id,count(*) as count,
            date(created_at) as date from users
            WHERE  `is_captin`=1 AND date(created_at) >= DATE(NOW()) - INTERVAL 7 DAY GROUP BY date(created_at),id");

        $urgentTrips_charts = DB::SELECT("select id,count(*) as count,
            date(created_at) as date from trips
            WHERE  `type`='urgent' AND date(created_at) >= DATE(NOW()) - INTERVAL 7 DAY GROUP BY date(created_at),id");

        $scheduledTrips_charts = DB::SELECT("select id,count(*) as count,
            date(created_at) as date from trips
            WHERE  `type`='scheduled' AND date(created_at) >= DATE(NOW()) - INTERVAL 7 DAY GROUP BY date(created_at),id");

        return view('cp.home',
            compact('urgentTrips','drivers','users','scheduledTrips','nots',
                'users_charts','shops_charts','urgentTrips_charts','countries',
                'scheduledTrips_charts'));
    }
}
