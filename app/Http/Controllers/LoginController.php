<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function authenticate(Request $request)
    {
        $request->validate(
            [
                'username'=>'required',
                'password'=>'required'
            ]
            );

            $username = $request->input('username');
            $password = $request->input('password');


            if(Auth::attempt(['name'=>$username,'password'=>$password]))
            {


            }
            else
            {
                $user = User::where('name',$username)->first();
                $namecheck = DB::table('users')->select('*')->whereRaw('BINARY name = ?',$username)->first();
                if($namecheck)
                {
                    $passwordcheck = DB::table('users')->select('*')->whereRaw('BINARY password = ?',$password)->first();

                    if($passwordcheck)
                    {
                        $login = DB::table('users')
                        ->select('*')
                        ->where('name','=',$username)
                        // ->whereRaw('BINARY name = ?', $username)
                        // ->whereRaw('BINARY name = ?', $username)
                        ->where('password','=',$password)
                        ->first();

                        if($login)
                        {
                            date_default_timezone_set('Asia/Kolkata');

                            Auth::login($user);
                            DB::table('userlogs')
                            ->insert([
                                "username"=>$username,
                                "login_time"=>date("Y-m-d H-i-s"),
                                "log_date"=>date("Y-m-d"),
                            ]);

                            return redirect('dashboard');
                        }
                    }
                    else
                    {
                        return redirect('/')->with('error','Password incorrect..!!');
                    }
                }
                else
                {
                    return redirect('/')->with('error',' Username incorrect..!!');
                }




                // else
                // {
                //     return redirect('/')->with('error',' Username Password incorrect..!!');
                // }
            }
    }

    public function logout(){
        date_default_timezone_set('Asia/Kolkata');
        $userlog = DB::table('userlogs')
        ->select('*')
        ->where('username','=',Auth::user()->name)
        ->orderBy('id','DESC')
        ->first();


        DB::table('userlogs')
        ->select('*')
        ->where('id','=',$userlog->id)
        ->update([
            "logout_time"=>date("Y-m-d H-i-s")
        ]);
        Auth::logout();

        return redirect('/');
    }
}
