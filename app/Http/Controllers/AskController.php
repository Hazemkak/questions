<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AskController extends Controller
{
    public function index(){
        return view('questions.addQuestion');
    }

    public function store(Request $req){
        $this->validate($req,[
            'body'=>'required|max:255',
        ]);
        

        if(Question::whereDate('created_at',Carbon::today())->get()->count()>=10){//Questions limit exceeds 10
            return redirect('ask')->with('warning','We can\'t recieve more question today, please try again tomorrow');
        }
        else if(DB::table('questions')->where('body',$req->body)->count()>0){//Question is repeated
            return redirect('ask')->with('warning','Your question was already asked before');
        }

        Question::create([
            'body'=>$req->body
        ]);
        return redirect('/questions');

    }
}
