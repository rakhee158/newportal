<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Http\Controllers\Admin\SubcategoryController;
use App\Models\Subcategory;
use App\Models\Category;
 use Str;
 use Auth;
use Redirect;
class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data_lists = Subcategory::where('is_active', 1)
                                ->orderBy('id','DESC')
                                ->orderBy('sort_id','DESC')
                                ->with('getUserOne','getCategory')
                                ->get();

        return view('admin.subcategory.index', compact(['data_lists']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           $data_lists= Category::all();
        return view('admin.subcategory.create',compact(['data_lists']));
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
            'title' => 'required',
        ]);
        
        Subcategory::create(
        [
            'categories_id'=>$request->category,
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'created_by' => Auth::user()->id,
        ]);

        $noties = array(
            'message' => 'Category Created Successfully!',
            'atype' => 'success',
            'aicon' => 'success'
        );
        return Redirect::route('admin.subcategory.index')->with($noties);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_lists =Subcategory::with('getUserOne')->find($id);
        $data_lists =Subcategory::with('getCategory')->find($id);

            return view('admin.subcategory.show', compact(['data_lists']));
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
         $data_lists = Subcategory::find($id);

           $data_lists->delete();
            $notices = array(
            'aicon' => 'success',
            'atype' => 'info',
            'atitle' => 'Deleted Successfully!!',
            'message' => $data_lists->title.', has been removed.'
    );

     return redirect()->back();
    
    }
    
}
