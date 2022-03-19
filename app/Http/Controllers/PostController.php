<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Hashtag;


use Auth;
//use Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() 
    {
      $this->middleware('auth');
    }
    public function index()
    {

        $current_user=Auth::user();
        $userTotalNumPost =  $current_user->postsCount();
        $userTotalNoLikes = $current_user->likesCount();
        $userTotalNocomments = $current_user->commentsCount();
           //isLikedByloggedUser
        $posts=Post::with(['User','Comments','Hashtags'])->get();

//'CASE WHEN post.user_id = {$current_user->id} THEN 1 ELSE 0 END) AS is_liked'

      
        // dd($posts);
        return view('posts.index',compact('posts','userTotalNumPost','userTotalNoLikes','current_user','userTotalNocomments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request)
    {
        $validated = $request->validate([
         'comment' => 'required',
         'postId' =>  'required',
        ]);

        $comment= new Comment();
        $comment->comment = $request->comment;
        $comment->post_id = $request->postId;
        $comment->user_id = Auth::id();

       
        $comment->save();
        if($comment->id)
            return response()->json([],200);     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
         'title' => 'required',
         'description' =>  'required',
        ]);

        $post= new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = Auth::id();

        //dd($post);
        $post->save();
        if($request->tags != ""){
            $tags=explode(',', $request->tags);
            foreach ($tags as $key => $tag) {
                $hashtag = new Hashtag();
                $hashtag->post_id= $post->id;
                $hashtag->tag= $tag;
                $hashtag->save();
            }
        }
        if($post->id)
            return response()->json([],200);        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        dd($post->likes()->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function likePostToggle(Request $request)
    {
         $post=Post::findOrFail($request->postId);

         $user= [];
         $liked=0;
         if(!$post->likes()->where('user_id', Auth::id())->exists()){
            array_push($user, Auth::id());
            $liked=1;
         }
           
         $post->likes()->sync($user);

         return response()->json(['liked'=>$liked],200);


    }

    public function islikedByUser(Request $request)
    {
        $post=Post::findOrFail($request->postId);

        $liked=0 ;
        if($post->likes()->where('user_id', Auth::id())->exists())
            $liked=1;
        

        return response()->json(['liked'=>$liked],200);
    }
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
       


        $post=Post::findOrFail($request->postId);
        if($post->user_id == Auth::id()){
            foreach ($post->comments as $key => $comment) {
                $comment->delete();
            }
            foreach ($post->Hashtags as $key => $Hashtag) {
                $Hashtag->delete();
            }
            $post->likes()->wherePivot('post_id','=',$request->postId)->detach();
            $post->delete();
            return response()->json([],200);     
        }
    }
}
