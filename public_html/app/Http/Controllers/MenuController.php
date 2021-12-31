<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Menu_item;

class MenuController extends Controller
{
    //
    public function index(){
        $menu= Menu_item::all();       
        return \view('admin.menu.index',['menu'=>$menu]);
    }
    public function show(){

        return \view('admin.menu.create');
    }
    public function store(Request $req)
    {
        
       
        $validator= $req->validate([

            'menu_item_name' => ['required', 'string'], 
            'slug' => ['required', 'string'], 
            'hasSubMenu' => ['required', 'integer'],    
            'status' => ['required', 'integer'],                 
                    
        ]);
       
       
        $menu= new Menu_item();
        $menu->menu_item_name = $req->input('menu_item_name');
        $menu->has_menu_subitems = $req->input('hasSubMenu');
        $menu->slug = $req->input('slug');
        $menu->status = $req->input('status');
        if($menu->save()){
            return redirect()->back()->with('success','Add Successfully!');
            
        }else{
            
            return redirect()->back()->with('danger','Failed to Add! Please Retry');
        }

    }
    public function edit(Request $req ,$id)
    {
        $link=Menu_item::where('id','=',$id)->get();
        return \view('admin.menu.edit',['link'=>$link]);
    }
    public function update(Request $req)
    {
        $validator= $req->validate([

            'menu_item_name' => ['required', 'string'], 
            'slug' => ['required', 'string'], 
            'hasSubMenu' => ['required', 'integer'],    
            'status' => ['required', 'integer'],                 
                    
        ]);
        $affectedRows = Menu_item::where("id",'=',$req->mid)->update(array(
            "menu_item_name" => $req->input('menu_item_name'),
            "has_menu_subitems" => $req->input('hasSubMenu'),
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
