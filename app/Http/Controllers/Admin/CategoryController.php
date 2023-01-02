<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Str;
use Auth;
use Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data_lists = Category::where('is_active', 1)
                                ->orderBy('id','DESC')
                                ->orderBy('sort_id','DESC')
                                ->with('getUserOne')
                                ->get();

        return view('admin.setup.category.index', compact(['data_lists']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setup.category.create');
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
        
        Category::create(
        [
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'created_by' => Auth::user()->id,
        ]);

        $noties = array(
            'message' => 'Category Created Successfully!',
            'atype' => 'success',
            'aicon' => 'success'
        );
        return Redirect::route('admin.category.index')->with($noties);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_lists =Category::with('getUserOne')->find($id);

            return view('admin.setup.Category.show', compact(['data_lists']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request,$id)
    {
        $data_lists = Category::find($request->category);
        return view('admin.setup.category.edit', compact(['data_lists']));
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
            'title'=>'required',
        ]);
             
        $data_lists = Category::find($id);
       
;        
        $data_lists->title =  $request->get('title');
         
        $data_lists->save();
 
        return Redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
       
         $data_lists = Category::find($id);

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
