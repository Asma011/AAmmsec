<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Menu_item;
use App\Models\Submenu_item;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller{
    //
    public function index(){
        return \view('admin.dashboard');
    }

    //Show Pages List
    public function ShowPagesList(){
        $pages = Page::join('menu_item', 'menu_item.id', '=', 'pages.menu_item_id')
              ->join('sub_menu_item', 'sub_menu_item.id', '=', 'pages.submenu_item_id')
              ->get(['pages.*', 'menu_item.menu_item_name','sub_menu_item.submenu_item_name']);
        
        return \view('admin.page.index',['pages'=>$pages ]);
    }
    public function ShowAddNewPage(Request $req){
        $menu= Menu_item::where('status','=',1)->get();
        $sub_menu= Submenu_item::where('status','=',1)->get();
        return \view('admin.page.add',['menu'=>$menu,'sub_menu'=>$sub_menu]);
    }

    public function AddNewPage(Request $req){
        //dd(\time().'.'.$req->banner_img_location->extension());
        // $validator= $req->validate([

        //     'menu_item_id' => ['required', 'integer'], 
        //     'slug' => ['required', 'string'],                    
                    
        // ]);
       
        $newfileName= \time().'.'.$req->banner_img_location->extension();
     
        $req->banner_img_location->move(public_path('assets/uploads/banners/'),$newfileName);
        $page = new Page();
        $page->page_title = $req->input('page_title');
        $page->banner_title = $req->input('banner_title');
        $page->banner_sub_title = $req->input('banner_sub_title');
        $page->banner_img_location = $newfileName;
        $page->Section_Content1 = $req->input('editor1');
        $page->Section_Content2 = $req->input('editor2');
        $page->Section_Content3 = $req->input('editor3');
        $page->slug = $req->input('slug');
        $page->menu_item_id = $req->input('menu_id');
        $page->submenu_item_id = $req->input('sub_menu_id');
        $page->is_helper_page = $req->input('is_helper_page');
     
        if($page->save()){
            return redirect()->back()->with('success','Add Successfully!');
            
        }else{
            
            return redirect()->back()->with('danger','Failed to Add! Please Retry');
        }
    }
    //Show  Edit Page Detail Form
    public function ShowEditPageForm(Request $req,$pid)
    {
        $menu= Menu_item::where('status','=',1)->get();
        $sub_menu= Submenu_item::where('status','=',1)->get();
        $page=Page::where('id','=',$pid)->get();
        return \view('admin.page.edit',['menu'=>$menu,'sub_menu'=>$sub_menu,'page'=>$page]);
    }
    //update Page Content 
    public function updatePage(Request $req)
    {
        $pid=$req->pid;
        $validator= $req->validate([

            'page_title' => ['required', 'string'], 
            'banner_title' => ['required', 'string'],  
            'editor1' => ['required', 'string'],    
            'slug' => ['required', 'string'],    
            'is_helper_page' => ['required', 'integer'],             
                    
        ]);
        $page = Page::findOrFail($pid);  
        $page->page_title = $req->input('page_title');
        $page->banner_title = $req->input('banner_title');
        $page->banner_sub_title = $req->input('banner_sub_title');        
        $page->Section_Content1 = $req->input('editor1');
        $page->Section_Content2 = $req->input('editor2');
        $page->Section_Content3 = $req->input('editor3');
        $page->slug = $req->input('slug');
        $page->menu_item_id = $req->input('menu_id');
        $page->submenu_item_id = $req->input('sub_menu_id');
        $page->is_helper_page = $req->input('is_helper_page');

        if($req->hasfile('banner_img_location')){
            $destination=public_path('/assets/uploads/banners/').$page['banner_img_location'];
            
            $newfileName= time().'.'.$req->banner_img_location->extension();
            
            if(FILE::exists($destination)){
                FILE::delete($destination);
            }
            $page->banner_img_location = $newfileName;
            $req->banner_img_location->move(public_path('/assets/uploads/banners/'),$newfileName);

        }
        $affectedRows = $page->update();
        if($affectedRows){
            return redirect()->back()->with('success','Updated Successfully!');
            
        }else{
            
            return redirect()->back()->with('danger','Failed to update! Please Retry');
        }

    }

}
