<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allcustomer = DB::table('customer_tb')
        ->select('*')
        ->get();

        $country = DB::table('countries')
        ->select('*')
        ->get();
        $convertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Converted')
        ->get();
        return view('pages.add_customer',compact('convertedleads','country','allcustomer'));
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
        //
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
        //
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

    public function getcountry(Request $request)
    {
        $countryid = $request->country;

        $country = DB::table('states')
        ->select('*')
        ->where('country_id','=',$countryid)
        ->get();

        return $country;
    }

    public function getcity(Request $request)
    {
        $stateid = $request->state;

        $city = DB::table('cities')
        ->select('*')
        ->where('state_id','=',$stateid)
        ->get();

        return $city;
    }

    public function getcountry2(Request $request)
    {
        $countryid = $request->country;

        $country = DB::table('states')
        ->select('*')
        ->where('country_id','=',$countryid)
        ->get();

        return $country;
    }

    public function getcity2(Request $request)
    {
        $stateid = $request->state;

        $city = DB::table('cities')
        ->select('*')
        ->where('state_id','=',$stateid)
        ->get();

        return $city;
    }

    public function copystate(Request $request)
    {
        $countryid = $request->countryID;

        $copystate = DB::table('states')
        ->select('*')
        ->where('country_id','=',$countryid)
        ->orderBy('state_name','asc')
        ->get();

        return $copystate;
    }

    public function copycity(Request $request)
    {

        $stateID = $request->stateID;

        $copycity = DB::table('cities')
        ->select('*')
        ->where('state_id','=',$stateID)
        ->orderBy('city_name','asc')
        ->get();

        return $copycity;
    }

    public function saveCustomer(Request $request)
    {

            $allcust = DB::table('customer_tb')
            ->select('*')
            ->count();

            $custid = $allcust+1;

            $customRadioInline1= $request->customRadioInline1;
            // $clientid = $request->client_id;
            $cname= $request->cname;
            $companyname= $request->companyname;
            $email=$request->email;
            $phone = $request->phone;
            $mobile = $request->mobile;
            $department = $request->department;
            $website = $request->website;
            $openbalance = $request->openbalance;
            $payterm = $request->payterm;
            $fb = $request->fb;
            $att1 = $request->att1;
            $att2= $request->att2;
            $region1 = $request->region1;
            $region2= $request->region2;
            $address1 =  $request->address1;
            $address2= $request->address2;
            //  $address1 = $_POST['address1'];
            // $address2= $_POST['address2'];
            $city1 = $request->city1;
            $city2= $request->city2;
            $state1 = $request->state1;
            $state2= $request->state2;
            $pincode1 = $request->pincode1;
            $pincode2= $request->pincode2;
            $phone1 = $request->phone1;
            $phone2 = $request->phone2;
            $remark = $request->remark;
            $pan = $request->phone2;
            $gst = $request->gstin;
            $contactperson    = $request->contactperson;
            $contactphone     = $request->contactphone;
            $gst_treatment    = $request->gst_treatment;
            $place_of_supply  = $request->place_of_supply;
            $tax_Preference   = $request->tax_Preference;
            $exemption_reason = $request->exemption_reason;
            $currency         = $request->currency;
            $leadid = $request->leadid;


            $customer = DB::table('customer_tb')->insert(
                [
                    'name' => $cname,
                    'type' => $customRadioInline1,
                    'company' => $companyname,
                    'email'=> $email,
                    'phone'=>$phone,
                    'mobile'=>$mobile,
                    'department'=>$department,
                    'websitename'=>$website,
                    'opening_balance'=>$openbalance,
                    'payment_type'=>$payterm,
                    'face_book'=>$fb,
                    'attention1'=>$att1,
                    'attention2'=>$att2,
                    'address1'=>$address1,
                    'address2'=>$address2,
                    'contry_region1'=>$region1,
                    'contry_region2'=>$region2,
                    'city1'=>$city1,
                    'city2'=>$city2,
                    'pin_code1'=>$pincode1,
                    'pin_code2'=>$pincode2,
                    'state1'=>$state1,
                    'state2'=>$state2,
                    'phone_no1'=>$phone1,
                    'phone_no2'=>$phone2,
                    'remark'=>$remark,
                    'pan_no'=>$pan,
                    'gst_in'=>$gst,
                    'contact_person'=>$contactperson,
                    'contact_phone'=>$contactphone,
                    'gst_treatment'=>$gst_treatment,
                    'place_of_supply'=>$place_of_supply,
                    'tax_Preference'=>$tax_Preference,
                    'exemption_reason'=>$exemption_reason,
                    'currency'=>$currency,
                    'lead_id'=>$leadid,
                    'client_id' => "REN-CUS-".$custid
                ]);




            if($customer)
            {
                return back();
            }
    }
}
