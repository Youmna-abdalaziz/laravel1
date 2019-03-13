<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\User;
class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }
    public function create()
    {
        $users = User::all();
        return view('posts.create',[
            'users' => $users,
        ]);
    }
    public function store()
    {
        Post::create(request()->all());
        return redirect()->route('posts.index');
    }
    public function edit(Post $post)
    {
        // $post = Post::where('id',$post)->get()->first();
        //select * from posts where id=1 limit 1;
        // $post = Post::where('id',$post)->first();
        // $post = Post::find($post);
        $users = User::all();
        return view('posts.edit', [
            'post' => $post,
            'users' => $users,
            ]);
        }
        public function update()
        {
            put::update(request()->all());
            return redirect()->route('posts.index');

        }
        public function show(Post $post)
        {
            return view('posts.show',[
                'post' => $post,
            ]);
        }
    

    public function destroy(Post $post)
    {
       // table('posts')->where('id', $post->id)->delete();
    }
}