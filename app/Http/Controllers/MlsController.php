<?php

namespace App\Http\Controllers;

use App\Mls;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
class MlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Mls = Mls::all();
        return view('mls',compact('Mls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = DB::select('select * from states');
        $counties = DB::select('select * from counties');
        return view('edit_mls',compact('states','counties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'mls_name' => 'required|unique:mlses',
            'state_initial' => 'required',
            'counties' => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $input = $request->all();
        $input['counties'] = json_encode($input['counties']);
        Mls::create($input);
        return response()->json(['success'=>'Record is successfully added']);
        // return redirect()->route('mls.index')
        //                 ->with('success','Mls created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mls  $mls
     * @return \Illuminate\Http\Response
     */
    public function show(Mls $mls)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mls  $mls
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //print_r($mls);exit;
        $states = DB::select('select * from states');
        $counties = DB::select('select * from counties');
        $mls = Mls::find($id);
        $mls_counties = json_decode($mls['counties']);
        return view('edit_mls',compact('states','mls','counties','mls_counties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mls  $mls
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mls = Mls::find($id);
        $validator = \Validator::make($request->all(), [
            'mls_name' => 'required',
            'state_initial' => 'required',
            'counties' => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        
        $mls->update($request->all());
        return response()->json(['success'=>'Record is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mls  $mls
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $mls = Mls::find($id);
       $mls->delete();
       $userData = Mls::all();
       return json_encode(array('data'=>$userData));
    }

    public function getCounties(Request $request)
    {
        $counties = DB::table("counties")
                    ->where("state_initial",$request->state_id)
                    ->pluck("county_name","id");
        return response()->json($counties);
    }
}
