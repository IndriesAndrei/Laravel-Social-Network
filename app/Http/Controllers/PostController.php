<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller 
{

    public function getDashboard() 
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $user = Auth::user();
        return view('dashboard', compact('posts', 'user'));
    }

    public function postCreatePost(Request $request)
    {
        // Validation
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);

        $post = new Post();
        $post->body = $request['body'];

        // we are saving the post to the currently authenticated user
        $request->user()->posts()->save($post);

         return redirect()->route('dashboard')->with('message', 'Post Created');
    }

    public function getDeletePost($id) 
    {
        $post = Post::find($id);
        if (Auth::user() != $post->user) {
           return redirect()->back()->with('message', 'You are not authorized to delete');
        }
        $post->delete();

        return redirect()->route('dashboard')->with('message', 'Successfully deleted');
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $post = Post::find($request['postId']);
        $post->body = $request['body'];
        if (Auth::user() != $post->user) {
            return redirect()->back()->with('message', 'You are not authorized to update');
         }
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }

    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true' ? true : false;
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
          return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }

        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
}