<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::Paginate(3);
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::with('subcategory')->get();
        return view('backend.post.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

            $validated = $request->validated();
            Post::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'image' => $request->file('image')->store('images', 'public'),
                'body' => $request->body,
                'category_id' =>$request->category_id,
            ]);

            return redirect()->back()->with('success', 'Post has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $id)
    {
        $post = Post::find($id);
        $cats = Category::all();

        return view('backend.post.edit', compact('post', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,Post $post)
    {
        $exactPost = Post::find($request->id);
        if ($request->hasFile('image'))
        {
            Storage::disk('public')->delete($exactPost->image);
            $fileName = 'img-'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $exactPost->update($request->input() + [
                    'image' => $request->file('image')->storeAs('images', $fileName,'public')
                ]);
            return redirect()->route('posts')->with('success', 'Post has been updated successfully.');
        } else {

            $exactPost->update($request->input());
            return redirect()->route('posts')->with('success', 'Post has been updated successfully.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id)
    {
        $exactPost = Post::find($id);
        $exactPost->delete();
        return redirect()->back()->with('success', 'Post has been Deleted successfully.');
    }
}
