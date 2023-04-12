<?php

namespace App\Providers;

use Facade\FlareClient\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        DB::listen(function($query) {
            File::append(
                storage_path('/logs/query.log'),
                $query->sql . ' [' . implode(', ', $query->bindings) . ']' . PHP_EOL
           );
        });

        $date = date('Y-m-d');

        $getdate = DB::table('notifications')
        ->select('*')
        ->where('notification_date','=',$date)
        ->count();

        // dd($getdate);

        view()->share('notificationcount1', $getdate);

        $date2 = date('Y-m-d');

        $getdate2 = DB::table('purchaseorders')
        ->select('*')
        ->where('due_date','=',$date2)
        ->count();

        view()->share('notificationcount', $getdate2);

        $salarydate = DB::table('salary_calulation')
        ->select('*')
        ->where('from_date','!=','')
        ->groupBy('from_date')
        ->get();

        view()->share('salarydate', $salarydate);

        $tosalarydate = DB::table('salary_calulation')
        ->select('*')
        ->where('to_date','!=','')
        ->groupBy('to_date')
        ->get();

        view()->share('tosalarydate', $tosalarydate);

        $noofemployee = DB::table('employees')
        ->select('*')
        ->get();
        view()->share('noofemployee', $noofemployee);

        $noofmonths = DB::table('calandars')
        ->select('*')
        ->groupBy('months')
        ->get();
        view()->share('noofmonths', $noofmonths);

        $todaydate = date("Y-m-d");
        $todaypresent = DB::connection('mysql2')
        ->table('attendance')
        ->select('*')
        ->where('logdate','=',$todaydate)
        ->groupBy('empid')
        ->get();

        view()->share('todaypresent', $todaypresent);

        $totalabsentcount = $noofemployee->count()-$todaypresent->count();

        view()->share('totalabsentcount', $totalabsentcount);


        // Purchase Order ID

                 $invID =0;
                    $maxValue = DB::table('purchaseorders')->max('id');
                    $invID=$maxValue+1;
                    $invID = str_pad($invID, 4, '0', STR_PAD_LEFT);

                    $poid="PO-".$invID;
                view()->share('poid', $poid);

        // Request ID

                $invID =0;
                $maxValue = DB::table('purchaserequests')->groupBy('requestid')->get()->count();
                $invID=$maxValue+1;
                $invID = str_pad($invID, 4, '0', STR_PAD_LEFT);

                $poreq="POREQ-".$invID;
            view()->share('poreq', $poreq);

            $monthyear1 = date("Y-m");
            view()->share('monthyear1', $monthyear1);
    }
}
