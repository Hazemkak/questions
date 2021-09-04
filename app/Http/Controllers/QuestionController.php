<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller
{
    public function index(){
        $questions=Question::all();

        return view('questions.question',[
            'questions'=>$questions,
        ]);
    }

    public function store(Request $req){
        $path="/questions"."/".$req->post_id;
        $this->validate($req,[
            'answer'=>'required|max:255',
        ]);
        if(DB::table('answers')->where('question_id',$req->post_id)->where('body',$req->answer)->count()>0){
            return redirect($path)->with('error','Answer was submitted before');
        }
        Answer::create([
            'body'=>$req->answer,
            'question_id'=>$req->post_id,
        ]);
        
        return redirect($path)->with('success','Answer is submmitted successfully');
    }

    public function show(Question $question){
        return view('questions.showQuestion',[
            'question'=>$question,
        ]);
    }

    public function delete(Request $req){
        DB::table('answers')->where('id',$req->ans_id)->delete();
        $path="/questions"."/".$req->q_id;
        return redirect($path)->with('success','Answer is removed successfully');
    }

    public function remove(Request $req){
        DB::table('questions')->where('id',$req->q_id)->delete();
        return redirect("/questions")->with('success','Question is removed successfully');
    }

}
