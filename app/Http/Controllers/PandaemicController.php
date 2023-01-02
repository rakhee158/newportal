<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class PandaemicController extends Controller
{
   
    public function index()
    {
        $datas = News::all();
       return view('admin.pandaemic',compact('datas'));
    }

    public function create()
    {
    
    }

    
    public function store(Request $request)
    {
       News::create(
        [
            'heading'=>$request->heading,
            'detail'=>$request->detail
        ]);
        return redirect()->back();
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $datas = News::all();
        return view('admin.edit',compact('datas'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'heading'=>'required',
            'detail'=>'required',
             
        ]);
        $datas = News::find($id);
        
        $datas->heading =  $request->get('heading');
        $datas->detail = $request->get('detail');
        
        $datas->save();
 
        return redirect(' /store1/store')->with('success', 'record updated.');
      }
    

    
    public function destroy($id)
    {
            dd('asdasd');
            $datas = News::find($id);
            $datas->delete();  
            return redirect()->back();
            
          
    }
}
