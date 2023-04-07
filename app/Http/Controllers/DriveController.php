<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folders = DB::table('drivefolders')
        ->select('*')
        ->get();

        $files = DB::table('drives')
        ->select('*')
        ->get();

        return view('pages.drive',compact('folders','files'));
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

    public function createfolder(Request $request)
    {
        $foldername = $request->foldername;

        $folder = DB::table('drivefolders')->insert(
            [
                'foldername' => $foldername,
            ]);

            return back()->with('success','Folder Created Successfully...');
    }

    public function fileupload(Request $request)
    {

        $foldername = $request->foldername;
        $userid = $request->userid;

        if($request->hasfile('fileupload'))
        {
            $file = $request->file('fileupload');
            $extension = $file ->getClientOriginalExtension();
            $filename = "drive".'_'.time().'.'.$extension;
            $file->move('images/',$filename);
            // $empimg = $filename;
            $fileupload = $filename;
        }

        $folder = DB::table('drives')->insert(
            [
                'foldername' => $foldername,
                'upload_files' => $fileupload,
                'userid' => $userid
            ]);

            if($folder)
            {
                return back()->with('success','File Uploaded Successfully...');
            }
    }

    public function filterdrive(Request $request)
    {
        $folderid = $request->folderid;

        $file = DB::table('drives')
        ->select('*')
        ->where('foldername','=',$folderid)
        ->get();

        return $file;
    }
}
