<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CommetentController extends Controller
{
    public function create()
    {
        $comment = new Comment();
        $comment-> content = request()->content;
        $comment->article_id=request()->article_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return back();
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        
        // if($comment->user_id == auth()->user()->id)
        // {
        //     $comment->delete();
        //     return back;
        // }else
        // {
        //     return back()->with ('error','Unauthorize');
        // }

        if(Gate::allows('comment-delete',$comment)){
            $comment->delete();
            return back();
        }else{
            return back()->with('errors','Unauthorize');
        }
    }

    public function __construct()
    {
        $this ->middleware('auth');
    }
}
