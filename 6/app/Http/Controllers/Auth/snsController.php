<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // <--- 追加
use \App\posts; // <--- 追加
use \App\User; // <--- 追加

class snsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function snsPage()
    {
        $posts = posts::latest()->get();  // <--- 追加
        return view('auth.sns', compact('posts'));   // <--- 変更
        //return view('auth.sns'); 
    }

    public function postsns(Request $request) // <--- 追加
    {
        $validator = $request->validate([
            'body' => ['required', 'string', 'max:255'],
        ]);

        posts::create([
            'user_id' => Auth::user()->id,

            'body' => $request->body,

        ]);
        return back();
    }

    public function destroy($id)
    {
        $post = posts::find($id);
        $post->delete();
        return back();
    }
}
