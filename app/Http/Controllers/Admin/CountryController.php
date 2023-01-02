<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Models\Country;
use Str;
use Auth;
use Redirect;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_lists = Country::where('is_active', 1)
                                ->orderBy('id','DESC')
                                ->orderBy('sort_id','DESC')
                                ->with('getUserOne')
                                ->get();

        return view('admin.setup.country.index', compact(['data_lists']));
    }

     
    public function create()
    {
        return view('admin.setup.country.create');
    }

     
    public function store(Request $request)
    {
        // dd($request);
         $request->validate([
            'cname' => 'required',
        ]);
        
        Country::create(
        [
            'slug' => Str::slug($request->cname),
            'cname' => $request->cname,
            'created_by' => Auth::user()->id,
        ]);

        $noties = array(
            'message' => 'country Created Successfully!',
            'atype' => 'success',
            'aicon' => 'success'
        );
        return Redirect::route('admin.country.index')->with($noties);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_lists =Country::with('getUserOne')->find($id);

            return view('admin.setup.country.show', compact(['data_lists']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data_lists = Country::find($request->country);
        return view('admin.setup.country.edit', compact(['data_lists']));
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
         $request->validate([
            'cname'=>'required',
        ]);
             
        $data_lists = Country::find($id);
       
;        
        $data_lists->cname =  $request->get('cname');
         
        $data_lists->save();
 
        return Redirect()->route('admin.country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         $data_lists = Country::find($id);
           $data_lists->delete();
            $notices = array(
            'aicon' => 'success',
            'atype' => 'info',
            'atitle' => 'Deleted Successfully!!',
            'message' => $data_lists->cname.', has been removed.'
    );

     return Redirect()->back();
 }
}
