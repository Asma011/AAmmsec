<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subpage;
use App\Models\Page;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class SubpageController extends Controller
{
    //List Of Sub Pages
    public function index(Request $req)
    {
        $subpages= Subpage::join('pages','sub_pages.page_id','=','pages.id')
        ->get(['sub_pages.*', 'pages.page_title']);
        return \view('admin.sub-page.index',['subpages'=>$subpages]);
    }
    //show add subpage form
    public function create(Request $req)
    {
        $pages=Page::all();
        return \view('admin.sub-page.create',['pages'=>$pages]);
    }
    //store sub page
    public function store(Request $req)
    {
        $validator= $req->validate([

            'page_id' => ['required', 'integer'],
            'sub_page_title' => ['required', 'string'],
            'banner_title' => ['required', 'string'],
            'banner_img_location' => ['required'],
            'editor1' => ['required', 'string'],
            'slug' => ['required', 'string'],   
            'status' => ['required', 'integer'],                 
                        
        ]);
       //// if($req->hasFile('banner_img_location')){
            $newFileName=\time().'.'.$req->banner_img_location->extension();
           
            $req->banner_img_location->move(\public_path('assets/uploads/banners/'),$newFileName);
        ////}
        $subpages=new Subpage();
        $subpages->page_id = $req->page_id;
        $subpages->sub_page_title = $req->sub_page_title;
        $subpages->banner_title = $req->banner_title;
        $subpages->banner_sub_title = $req->banner_sub_title;
        $subpages->banner_img_location = $newFileName;
        $subpages->Section_Content1 = $req->editor1;
        $subpages->Section_Content2 = $req->editor2;
        $subpages->Section_Content3 = $req->editor3;    
        $subpages->slug = $req->slug;
        $subpages->Status= $req->status;
       
        if($subpages->save()){
            return \redirect()->back()->with('success','Added Successfully!');
        }else{
            return \redirect()->back()->with('danger','Faild to Add Please Retry!');
        }
    }
    //show edit page
    public function edit(Request $req,$spid)
    {
        $pages=Page::all();
        $subpage= Subpage::join('pages','sub_pages.page_id','=','pages.id')
        ->where('sub_pages.id','=',$spid)
        ->get(['sub_pages.*', 'pages.page_title']);
        return \view('admin.sub-page.edit',['pages'=>$pages,'subpages'=>$subpage]);
    }
    //update edited detail 
    public function update(Request $req)
    {
        
        $validator= $req->validate([
            'page_id' => ['required', 'integer'],
            'sub_page_title' => ['required', 'string'],
            'banner_title' => ['required', 'string'],            
            'editor1' => ['required', 'string'],
            'slug' => ['required', 'string'],   
            'status' => ['required', 'integer'],                
                        
        ]);
       $spid=$req->spid;
       $subpage= Subpage::findOrFail($spid); 
       $subpage->page_id = $req->page_id;
       $subpage->sub_page_title = $req->sub_page_title;
       $subpage->banner_title = $req->banner_title;
       $subpage->banner_sub_title = $req->banner_sub_title;    
       $subpage->Section_Content1 = $req->editor1;
       $subpage->Section_Content2 = $req->editor2;
       $subpage->Section_Content3 = $req->editor3;    
       $subpage->slug = $req->slug;
       $subpage->Status= $req->status;

       if($req->hasfile('banner_img_location')){
        $destination=public_path('/assets/uploads/banners/').$subpage['banner_img_location'];
        
        $newfileName= time().'.'.$req->banner_img_location->extension();
        
        if(FILE::exists($destination)){
            FILE::delete($destination);
        }
        $subpage->banner_img_location = $newfileName;
        $req->banner_img_location->move(public_path('/assets/uploads/banners/'),$newfileName);

    }
    $affectedRows = $subpage->update();
    if($affectedRows){
        return redirect()->back()->with('success','Updated Successfully!');
        
    }else{
        
        return redirect()->back()->with('danger','Failed to update! Please Retry');
    }
      

    }
}
