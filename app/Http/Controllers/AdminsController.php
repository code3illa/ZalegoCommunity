<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
    //

    public function index()
    {
        $users = DB::table("users")->count();
        $questions = DB::table("questions")->count();
        $comments = DB::table("comments")->count();
        $members = User::all();

        $details = array("$users", "$questions", "$comments");
        return view('admin.index', ['details' => $details, 'members' => $members]);


    }

    public function questions()
    {
        $questions = DB::table('users')
            ->join('questions', 'users.id', '=', 'questions.user_id')
            ->select('users.id as uid', 'users.profpic as profpic', 'users.name as name', 'questions.id as qid', 'questions.title as title', 'questions.question as question', 'questions.created_at as created_at')->orderBy('questions.created_at', 'desc')
            ->paginate(5);
        return view('admin.questions', ['questions' => $questions]);
    }


    public function show(Request $request)
    {
        $quiz = $request->input('quiz_id');
        $questions = DB::table('questions')
            ->join('users', 'users.id', '=', 'questions.user_id')
            ->where('questions.id', '=', $quiz)
            ->select('users.id as uid', 'users.profpic as profpic', 'users.name as name', 'questions.id as qid', 'questions.title as title', 'questions.question as question', 'questions.created_at as created_at')->get();
        $comments = DB::select("SELECT * FROM comments WHERE question_id=$quiz");
        return view('admin.show', ['questions'=> $questions], ['comments'=> $comments]);

    }
}
