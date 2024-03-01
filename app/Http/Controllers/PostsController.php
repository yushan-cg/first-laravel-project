<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile\getClientOriginalName;
use App\Models\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Blog";
        // $posts = Post::all();
        // $posts = Post::orderBy('title', 'asc')->get();
        $posts = DB::select('SELECT * FROM posts');
        return view('posts.index')->with(compact('title', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:4096'
        ]);
        
        /**
         * Handle the file upload 
         */
        if($request->hasFile('cover_image')){
            //get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            
            // store the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);

            /**
             * php artisan storage:link
             * [C:\wamp64\www\myproject\public\storage] link has been connected to [C:\wamp64\www\myproject\storage\app/public].
             * after linking, the changes in storage\app\public will be synced to public\storage
             */

        }else{
            $filenameToStore = 'noimage.jpeg';
        }

        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $filenameToStore; // save the filename to the database
        $post->save();

        return redirect('/posts')->with('success','Post created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized page.');
        }
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:4096'
        ]);
        
        /**
         * Handle the file upload 
         */
        if($request->hasFile('cover_image')){
            //get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            
            // store the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }

        $post = Post::find($id);
        $post->user_id = auth()->user()->id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $filenameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success','Post updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', "$post->title removed.");
    }
}
