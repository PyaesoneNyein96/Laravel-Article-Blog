<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homefeed;
use Illuminate\Support\Facades\Gate;

class HomeFeedController extends Controller
{
    public function index() {
        $homeFeed = Homefeed::latest()->paginate(6);
        return view('home.index',[
            'datas' => $homeFeed,
        ]);
    }


    public function detail($id) {
        $detail = Homefeed::find($id);
        return view('home.detail',[
            'feedDetail' => $detail,
        ]);
    }



    public function createPost() {
        $validator = validator(request()->all(),[
            'name' => 'required',
            'content' => 'required',
            'category_id'=> 'required',
            // 'user_id'=> 'required',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $createPost = new Homefeed;
        $createPost->name = request()->name;
        $createPost->content = request()->content;
        $createPost->category_id = request()->category_id;
        $createPost->user_id = auth()->user()->id;
        $createPost->save();

        return redirect('/');
    }

    // public function postDelete($id) {
    //     $delete = Homefeed::find($id);
    //     $delete->delete();
    //     return redirect('/')->with('del-info',"($delete->name)-($delete->user->name) has been deleted");
    // }

    public function postDelete($id) {
        $delete = Homefeed::find($id);
        if(Gate::allows('article-del',$delete)){
            $delete->delete();

            return redirect('/')->with('del-info',"($delete->name by: {$delete->user->name})- has been deleted");
        }else{
            return back()->with('error', 'Unauth');
        }
    }

    public function __construct() {
        $this->middleware('auth')->except('index','detail');
    }
}
