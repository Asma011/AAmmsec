<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use App\Models\Quiz;
Use App\Models\Quizdetails;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index(Request $req)
    {
        $users=User::All();
        return \view('admin.user.index',['users'=>$users]);
    }
    public function ShowUserDasboard(Request $req)
    {
        return \view('user.dashboard');
    }

    public function getQuizQuestion(){

        $quiz=Quizdetails::join('quizes','quiz_detail.Qid','=','quizes.id')
        ->where('quizes.Status','=',1)
        ->get(['quiz_detail.*', 'quizes.Quiz_Title','quizes.Quiz_Sub_Title']);
        return response()->json([
            'status'=>$quiz]);
    }
}
