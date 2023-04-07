<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('pages.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();

        $rules = array(
            "name" => 'required',
            "role"=>'required',
            'epass' => 'required',
        );

        $validator = Validator::make($request->all(),$rules);

        if($validator -> fails())
        {
            return $validator -> errors();
        }
        else
        {
            $allusers = DB::table('users')
            ->select('*')
            ->where('name','=',$request -> name)
            ->first();

            $users ->name = $request -> name;
            $users ->roll = $request -> role;
            $users ->password = $request -> epass;
            $users ->Products = $request -> products;
            $users ->Customers = $request -> customers;
            $users ->Services = $request -> services;
            $users ->addemployee = $request -> addemp;
            $users ->idcard = $request -> idcard;
            $users ->empreport = $request -> empreport;
            $users ->empcategory = $request -> empcategory;
            $users ->pfdata = $request -> pfdata;
            $users ->adduser = $request -> adduser;
            $users ->calendar = $request -> calendar;
            $users ->attendanceentry = $request -> attendanceentry;
            $users ->monthwisereport = $request -> monthwisereport;
            $users ->monthwisereportfull = $request -> monthwisefullreport;
            $users ->salarygen = $request -> salarygeneration;
            $users ->salaryreport = $request -> salaryreport;
            $users ->payslip = $request -> payslip;
            $users ->companydetails = $request -> companydetails;
            $users ->bankdetails = $request -> bankdetails;

            $users ->estimate = $request -> estimate;
            $users ->invoice = $request -> invoice;
            $users ->customercredit = $request -> customercredit;
            $users ->Vendor = $request -> vendor;
            $users ->purchaseentry = $request -> purchaseentry;
            $users ->expense = $request -> expense;
            $users ->purchaseorder = $request -> purchaseorder;
            $users ->invoicereport = $request -> invoicereport;
            $users ->incomereport = $request -> incomereport;
            $users ->purchasereport = $request -> purchasereport;
            $users ->estimatereport = $request -> estimatereport;
            $users ->expensereport = $request -> expensereport;
            $users ->leadgen = $request -> leadgeneration;
            $users ->callupdate	 = $request -> callupdate;
            $users ->proposal	 = $request -> proposal;
            $users ->drive = $request -> drive;

            if($allusers == '')
            {
                $savedata = $users->save();

                if($savedata)
                {
                    return back()->with('success','Users Created Successfully...');
                }
            }
            else
            {
                return back()->with('success','Already Username Created...');
            }



        }





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getuser()
    {

        $users = DB::table('users')
        ->select('*')
        ->get();

        return response()->json(['users'=>$users]);
    }

    public function getuserdetails(Request $request)
    {
        $id = $request->id;
        $getuserdetails = DB::table('users')
        ->select('*')
        ->where('id','=',$id)
        ->first();

        return $getuserdetails;
    }

    public function updateuser(Request $request)
    {
        $users = User::find($request ->id);

        $users ->name = $request -> name;
            $users ->roll = $request -> role;
            $users ->password = $request -> epass;
            $users ->Products = $request -> products;
            $users ->Customers = $request -> customers;
            $users ->Services = $request -> services;
            $users ->addemployee = $request -> addemp;
            $users ->idcard = $request -> idcard;
            $users ->empreport = $request -> empreport;
            $users ->empcategory = $request -> empcategory;
            $users ->pfdata = $request -> pfdata;
            $users ->adduser = $request -> adduser;
            $users ->calendar = $request -> calendar;
            $users ->attendanceentry = $request -> attendanceentry;
            $users ->monthwisereport = $request -> monthwisereport;
            $users ->monthwisereportfull = $request -> monthwisefullreport;
            $users ->salarygen = $request -> salarygeneration;
            $users ->salaryreport = $request -> salaryreport;
            $users ->payslip = $request -> payslip;
            $users ->companydetails = $request -> companydetails;
            $users ->bankdetails = $request -> bankdetails;

            $users ->estimate = $request -> estimate;
            $users ->invoice = $request -> invoice;
            $users ->customercredit = $request -> customercredit;
            $users ->Vendor = $request -> vendor;
            $users ->purchaseentry = $request -> purchaseentry;
            $users ->expense = $request -> expense;
            $users ->purchaseorder = $request -> purchaseorder;
            $users ->invoicereport = $request -> invoicereport;
            $users ->incomereport = $request -> incomereport;
            $users ->purchasereport = $request -> purchasereport;
            $users ->estimatereport = $request -> estimatereport;
            $users ->expensereport = $request -> expensereport;
            $users ->leadgen = $request -> leadgeneration;
            $users ->callupdate	 = $request -> callupdate;
            $users ->proposal	 = $request -> proposal;
            $users ->drive = $request -> drive;

            $updatedata = $users->save();

            if($updatedata)
            {
                return back()->with('success','Data Updated');
            }
    }

    public function deleteuser($id)
    {
        $user = User::find($id)->delete();

        if($user)
        {
            return back()->with('success','User Data Deleted..');
        }
    }


}
