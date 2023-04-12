<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getnotification(Request $request)
    {
        $date = $request->today;


        $notification = DB::table('notifications')
        ->select('*')
        ->where('notification_date','=',$date)
        ->get();

        return $notification;
    }

    public function getnotification2(Request $request)
    {
        $date = $request->today;



        $notification = DB::table('purchaseorders')
        ->select('*')
        ->where('due_date','=',$date)
        ->get();



        return $notification;
    }
}
