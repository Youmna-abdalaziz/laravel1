<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
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
    public function store(StorePostRequest $request)
    {
        Post::create($request->all());
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
        public function update(UpdatePostRequest $request,Post $post)
        {
            //dd($request);
            //$users = User::all();
            //dd($users->pluck('id')->toArray());
            //dd($users['items']);
            //if (in_array($request['user_id'],$users['#items'])){
            //    echo "hdhhdhdhdh";
            //}
            Post::where('id',$post->id)->update(['title'=>$request['title'],'description'=>$request['description'],'user_id'=>$request['user_id']]);
            //Post::update($request()->all());
            return redirect()->route('posts.index');
            

        }
        /*public function update(Post $post)
        {
            $post->update(request()->all());
            return redirect()->route('posts.index');

        }*/
        public function show(Post $post)
        {
            $users = User::all();
            return view('posts.show',[
                'post' => $post,
                'users' => $users,
            ]);
        }
    

    public function destroy(Post $post)
    {
       $affectedRows = Post::where('id',$post->id)->delete();
       return redirect()->route('posts.index');
    }
}