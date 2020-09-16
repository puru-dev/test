<?php

namespace App\Http\Controllers;

use App\County;
use Illuminate\Http\Request;
use DB;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $County = County::all();
        return view('counties',compact('County'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = DB::select('select * from states');
        return view('create_county',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'county_name' => 'required||unique:counties',
            'state_initial' => 'required',
            'state_fullname' => 'required',
        ]);
  
        County::create($request->all());
   
        return redirect()->route('county.index')
                        ->with('success','County created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\County  $county
     * @return \Illuminate\Http\Response
     */
    public function show(County $county)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\County  $county
     * @return \Illuminate\Http\Response
     */
    public function edit(County $county)
    {
         
        $states = DB::select('select * from states');

        return view('edit_county',compact('states','county'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\County  $county
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, County $county)
    {
        $request->validate([
            'county_name' => 'required',
            'state_initial' => 'required',
            'state_fullname' => 'required',
        ]);
  
        
        $county->update($request->all());
        return redirect()->route('county.index')
                        ->with('success','County Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\County  $county
     * @return \Illuminate\Http\Response
     */
    public function destroy(County $county)
    {
        $county->delete();
  
        return redirect()->route('county.index')
                        ->with('success','County deleted successfully');
    }
}
