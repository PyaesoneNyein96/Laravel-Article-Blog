<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function createComment(){
        $cmt= new Comment;
        $cmt->content = request()->content;
        $cmt->homefeed_id = request()->homefeed_id;
        $cmt->user_id = auth()->user()->id;
        $cmt->save();

        return back();
    }



    public function delCmt($id){
        $delCmt =Comment::find($id);

        if(Gate::allows('cmt-delete',$delCmt)){
            $delCmt->delete();
            return back();
        }else{
            return back()->with('error','Unauth');
        }
    }

    // public function delCmt($id) {
    //     $delCmt =  Comment::find($id);

    //     if($delCmt->user_id == auth()->user()->id){
    //         $delCmt->delete();
    //         return back();
    //     }else{
    //         return back()->with('errors', 'Unauth');
    //     }
    // }







    public function __construct() {
        $this->middleware('auth');
    }
}
