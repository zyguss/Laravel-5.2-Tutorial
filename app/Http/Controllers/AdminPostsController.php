<?php

// php artisan make:controller --resource AdminPostsController 

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
// use Illuminate\Support\Facades\Auth;
use Auth;
use App\Photo;
use App\Category;
use Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // use App\Category; a moze i ovako
        $categories = \App\Category::lists('name', 'id')->all();
        return view('admin.posts.create' ,compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */    
                     // jebo sam ti majku
    public function store(Requests\PostsMakeRequest $request)
    {
        $input = $request->all();
        
        $user = Auth::user(); // uzimamo ulogovanog korisnika - user-a
        if($file = $request->file('photo_id')){ // proveravamo da li je prosledjena slika
            $name = time() . $file->getClientOriginalName(); // uzimamo originalno ime slike
            $file->move('images', $name); // smestamo sliku u public/images
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        
        $user->posts()->create($input);
        return redirect('admin/posts');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        
        $categories = Category::lists('name', 'id')->all();
        
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        
        // pogledaj 53. i 61. red - ovde smo spojili prakticno
        Auth::user()->posts()->whereId($id)->first()->update($input);
        
        Session::flash('updated_post', 'The post has been updated');
        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path() . $post->photo->file); // brisemo sliku iz baze, ne moramo da stavimo /images/ u putanju jer imamo accessor
        $post->delete();
        
        Session::flash('deleted_post', 'The post has been deleted');
        return redirect('/admin/posts');
    }
}
