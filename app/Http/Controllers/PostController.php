<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view("blog-post", ["post" => $post]);
    }

    public function create()
    {
        return view("admin.posts.create");
    }

    public function show()
    {
        $this->authorize("create", Post::class);
        $posts = Post::all();
        return view("admin.posts.show", ["posts" => $posts]);
    }

    public function store(Post $post)
    {
        $this->authorize("create", Post::class);
        $inputs = request()->validate([
            "title" => "required|min:8|max:255",
            "body" => "required"
        ]);

        $post->title = $inputs["title"];
        $post->body = $inputs["body"];

        auth()->user()->posts()->save($post);

        session()->flash("message-create", "Post was created");

        return redirect()->route("post.show");
    }

    public function edit(Post $post)
    {
        return view("admin.posts.edit", ["post" => $post]);
    }

    public function update(Post $post)
    {
        $this->authorize('update', $post);
        $inputs = request()->validate([
            "title" => "required|min:8|max:255",
            "body" => "required"
        ]);

        $post->title = $inputs["title"];
        $post->body = $inputs["body"];

        $post->save();
        return redirect()->route("post.show");
    }

    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash("message", "Post was deleted");
        return back();
    }
}
