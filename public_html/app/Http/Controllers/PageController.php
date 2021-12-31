<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    //menu direct pages
    public function getMainPageDetail($PageId, $slug){
      
        $pages=Page::where([['menu_item_id','=',$PageId],['slug','=',$slug]])->get(); 
        //dd($pages);
        return \view('page-template',['pages'=>$pages]);      

    }
    //maue sub pages
    public function getPageDetail($subPageId,$slug){
      
        $pages=Page::where([['submenu_item_id','=',$subPageId],['slug','=',$slug]])->get(); 
      
        return \view('page-template',['pages'=>$pages]);      

    }
}
