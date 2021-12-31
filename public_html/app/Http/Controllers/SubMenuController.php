<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Menu_item;
use App\Models\Submenu_item;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class SubMenuController extends Controller
{
    //
    public function index()
    {
        $submenu = Submenu_item::join('menu_item', 'sub_menu_item.menu_item_id', '=', 'menu_item.id')           
              ->get(['sub_menu_item.*', 'menu_item.menu_item_name']);
              
              return \view('admin.sub-menu.index',['submenu'=>$submenu]);
    }
    //Show Edit page
    public function show(){
        $menu=Menu_item::where('status','=',1)->get();

        return \view('admin.sub-menu.create',['menu'=>$menu]);
    }

    public function store(Request $req)
    {
        $validator= $req->validate([

            'submenu_item_name' => ['required', 'string'],            
            'menu_item_id' => ['required', 'integer'],
            'slug' => ['required', 'string'],     
            'status' => ['required', 'integer'],                
                    
        ]);
       
       
        $submenu= new Submenu_item();
        $submenu->submenu_item_name = $req->input('submenu_item_name');
        $submenu->menu_item_id = $req->input('menu_item_id');
        $submenu->slug = $req->input('slug');
        $submenu->status = $req->input('status');
        if($submenu->save()){
            return redirect()->back()->with('success','Add Successfully!');
            
        }else{
            
            return redirect()->back()->with('danger','Failed to Add! Please Retry');
        }

    }
    public function edit($id )
    {
        
        $link=Submenu_item::where('id','=',$id)->get();
       
        $menu=Menu_item::where('status','=',1)->get();
       
        return \view('admin.sub-menu.edit',['link'=> $link,'menu' => $menu]);
    }
    public function update(Request $req)
    {
        $validator= $req->validate([

            'submenu_item_name' => ['required', 'string'], 
            'slug' => ['required', 'string'], 
            'menu_item_id' => ['required', 'integer'],    
            'status' => ['required', 'integer'],                 
                    
        ]);
        $affectedRows = Submenu_item::where("id",'=',$req->smid)->update(array(
            "submenu_item_name" => $req->input('submenu_item_name'),
            "menu_item_id" => $req->input('menu_item_id'),
            "slug" => $req->input('slug'),
            "status" => $req->input('status')
        
        ));
        if($affectedRows){
            return redirect()->back()->with('success','Updated Successfully!');
            
        }else{
            
            return redirect()->back()->with('danger','Failed to Update! Please Retry');
        }
    }

}
