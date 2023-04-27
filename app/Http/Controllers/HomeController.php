<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Image;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::join('images', 'images.post_id', '=', 'posts.id')
            ->select('posts.*', 'images.*')
            ->get();

        return view('home')->with('posts', $posts);
    }

    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'imagen'=> 'required|image|max:3048',
            'category'=> 'required',
        ]);

        $post = new Post();
        $post->name = $validated['name'];
        $post->status = $validated['status'];
        $post->user_id = Auth::user()->id ;
        $post->category_id = $validated['category'];

    if ($request->hasFile('imagen')) {
        $nombre_imagen = $request->file('imagen')->getClientOriginalName();
    }
    
    $image = new Image();
    
    $image->url = $request->file('imagen')->getClientOriginalName();
    
    $path = $request->file('imagen')->storeAs('public/images', $image->url);
    $last_image = new Image();

    $post->save();
    $image->post_id = Post::latest('id')->value('id');
    $image->save();

    $posts = Post::join('images', 'images.post_id', '=', 'posts.id')
            ->select('posts.*', 'images.*')
            ->get();

        return view('home')->with('posts', $posts);
}

    public function delete($id){
            $post = Post::find($id);

            if ($post) {
                $post->delete();
            }

            $posts = Post::join('images', 'images.post_id', '=', 'posts.id')
            ->select('posts.*', 'images.*')
            ->get();

        return view('home')->with('posts', $posts);
        }

        public function edit($id){
            $post = Post::find($id);

            $categories = Category::select('id', 'name')->get();
            
            
            $posts = Post::join('images', 'images.post_id', '=', 'posts.id')
                    ->select('posts.*', 'images.*')
                    ->get();

                    return view('admin.edit', ['post' => $post]);

        }

public function update(Request $request, $id)
{
   

    $posts = Post::join('images', 'images.post_id', '=', 'posts.id')
                    ->select('posts.*', 'images.*')
                    ->get();

            return view('home')->with('posts', $posts);
}


}