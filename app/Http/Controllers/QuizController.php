<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Quiz;
Use App\Models\Quizdetails;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    //
    public function index(Request $req)
    {
        //tables quizes & quiz_detail
        $quizs=Quiz::all();
       
        return \view('admin.quiz.index',['quizs'=>$quizs]);
    }
    public function show(Request $req)
    {
        return \view('admin.quiz.create');
    }
    public function create(Request $req)
    {
        $validator= $req->validate([

            'Quiz_Title' => ['required', 'string'],
            'Quiz_Sub_Title' => ['required', 'string'],
            'Status' => ['required', 'integer'],                             
                        
        ]);
        $quiz= new Quiz();
        $quiz->Quiz_Title = $req->Quiz_Title;
        $quiz->Quiz_Sub_Title = $req->Quiz_Sub_Title;
        $quiz->Status = $req->Status;
        
        if($quiz->save()){
            return redirect()->back()->with('success','Saved Successfully!');
            
        }else{
            
            return redirect()->back()->with('danger','Failed to Save! Please Retry');
        }
        
    }
    public function edit(Request $req,$qid)
    {
        $quiz=Quiz::where('id','=',$qid)->get();
        return \view('admin.quiz.edit',['quiz'=>$quiz]);
    }
    public function update(Request $req)
    {
        $validator= $req->validate([

            'Quiz_Title' => ['required', 'string'],
            'Quiz_Sub_Title' => ['required', 'string'],
            'Status' => ['required', 'integer'],                             
                        
        ]);
        $quiz=Quiz::findOrFail($req->qid);
        $quiz->Quiz_Title = $req->Quiz_Title;
        $quiz->Quiz_Sub_Title = $req->Quiz_Sub_Title;
        $quiz->Status = $req->Status;
        $affectedRows = $quiz->update();
        if($affectedRows){
            return redirect()->back()->with('success','Updated Successfully!');
            
        }else{
            
            return redirect()->back()->with('danger','Failed to update! Please Retry');
        }
    }


    ///////////Quiz Detail Manage//////////////////////////
    ///////////////////////////////////////////////////////
    public function QdIndex(Request $req,$qdid)
    {
        $quizdetails=Quizdetails::where('Qid','=', $qdid)->get();
        return \view('admin.quiz.quiz-detail.index',['quizdetails'=>$quizdetails]);    
    }
    public function editQuestion(Request $req,$queId)
    {

        $quizDetail=Quizdetails::where('id','=',$queId)->get();
       
        return \view('admin.quiz.quiz-detail.edit_question',['quizDetail'=>$quizDetail]);
    }
    public function updateQuestion(Request $req)
    {
        $validator= $req->validate([

            'Question' => ['required', 'string'],
            'OptionA' => ['required', 'string'],
            'OptionB' => ['required', 'string'],   
            'OptionC' => ['required', 'string'],   
            'OptionD' => ['required', 'string'],  
            'correctAnswer' => ['required', 'string'],    
            'remarks' => ['required', 'string'],                        
                        
        ]);

        $quizDetail=Quizdetails::findOrFail($req->queid);
        $quizDetail->Question = $req->Question ;
        $quizDetail->OptionA = $req->OptionA ;
        $quizDetail->OptionB = $req->OptionB ;
        $quizDetail->OptionC = $req->OptionC ;
        $quizDetail->OptionD = $req->OptionD ;
        $quizDetail->correctAnswer = $req->correctAnswer ;
        $quizDetail->remarks = $req->remarks ;

        $affectedRows = $quizDetail->update();
        if($affectedRows){
            return redirect()->back()->with('success','Updated Successfully!');
            
        }else{
            
            return redirect()->back()->with('danger','Failed to update! Please Retry');
        }
    }
    public function createQuizQuestion(Request $req){
        $quizs=Quiz::all();       
        return \view('admin.quiz.quiz-detail.create',['quizs'=>$quizs]);

    }
    public function storeQuizQuestion(Request $req)
    {
        $validator= $req->validate([

            'quizid' => ['required', 'integer'],
            'Question' => ['required', 'string'],
            'OptionA' => ['required', 'string'],
            'OptionB' => ['required', 'string'],   
            'OptionC' => ['required', 'string'],   
            'OptionD' => ['required', 'string'],  
            'correctAnswer' => ['required', 'string'],  
            'remarks' => ['required', 'string'],                         
                        
        ]);

        $quizDetail= new Quizdetails();
        $quizDetail->Qid = $req->quizid;
        $quizDetail->Question = $req->Question ;
        $quizDetail->OptionA = $req->OptionA ;
        $quizDetail->OptionB = $req->OptionB ;
        $quizDetail->OptionC = $req->OptionC ;
        $quizDetail->OptionD = $req->OptionD ;
        $quizDetail->correctAnswer = $req->correctAnswer ;
        $quizDetail->remarks = $req->remarks ;

        
        if($quizDetail->save()){
            return redirect()->back()->with('success','Added Successfully!');
            
        }else{
            
            return redirect()->back()->with('danger','Failed to Add! Please Retry');
        }
    }
    


}
