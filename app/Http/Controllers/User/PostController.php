<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Str;
use Auth;
use Redirect;
use App\Models\Category;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                $data_lists = Post::where('is_active', 1)
                                ->orderBy('id','DESC')
                                ->orderBy('sort_id','DESC')
                                ->with('getUserOne')
                                ->get();

        return view('admin.users.post.index', compact(['data_lists']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data_lists= Category::all();
        return view('admin.users.post.create',compact(['data_lists']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
       $data_lists= new Post();   
        $request->validate([

            'title' => 'required',
            'detail' => 'required',  
            'image' => 'mimes:jpeg,bmp,png|required| max:1024'

        ]);

             if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/image'), $filename);
            // $data_lists['image']= $filename;
        
        Post::create(
        [
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'detail' => $request->detail,
            'image' => $filename,

            'created_by' => Auth::user()->id,
        ]);
}
        $noties = array(
            'message' => 'Category Created Successfully!',
            'atype' => 'success',
            'aicon' => 'success'
        );
        return Redirect::route('User.post.index')->with($noties);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_lists =Post::with('getUserOne')->find($id);

            return view('admin.users.Post.show', compact(['data_lists']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $data_lists = Post::find($id);
        return view('admin.users.post.edit', compact(['data_lists']));
    }

     
      
    public function update(Request $request, $id)
    {
        // dd($request->all());
       $request->validate([
            'title' => 'required',
            'detail' => 'required',  
            'image' => 'mimes:jpeg,bmp,png'
        ]);

              $data_lists = Post::find($id);
       if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/image'), $filename);
                    $data_lists->image =  $filename;

        }

        $data_lists->title =  $request->get('title');
        $data_lists->detail =  $request->get('detail');
         
        $data_lists->update();
 
        return Redirect()->route('User.post.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data_lists = Post::find($id);

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
