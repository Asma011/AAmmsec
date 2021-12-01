<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Home_content;
Use App\Models\Quiz;
Use App\Models\Quizdetails;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    //home page    
    public function index(){
        $home_content = Home_content::all();
        return \view('index',['contents'=>$home_content]);
    }
    
     

}
