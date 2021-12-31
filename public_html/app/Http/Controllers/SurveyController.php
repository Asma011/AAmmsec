<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexsurveyList()
    {
        //
        $surveys=Survey::all();
        return  \view('admin.survey.index',['surveys'=>$surveys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
       
       $status=0;
       $last_Id="";
       $validator=$req->validate([
            'name' => ['required','string'],
            'email' =>['required','email'],
       ]);
       $survey=new Survey();
       $survey->name = $req->name;
       $survey->email = $req->email;
       $survey->mobile = $req->mobile;
       $survey->total_que = $req->total_que;
       $survey->correct_count = $req->correct_count;
       $survey->incorrect_count = ($req->total_que-$req->correct_count);
       $survey->percentage=(($req->correct_count/$req->total_que)*100);
       if($survey->save()){
           
            $status=1;
            $last_Id=$survey->id;
       }
       return response()->json(['status'=>$status,'last_Id'=>$last_Id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        //
    }
    public function surveyResult(Request $req,$id)
    {
        //
        $survey=Survey::where('id','=',$id)->get();
        return \view('survey-result',['survey'=>$survey]);

    }
}
