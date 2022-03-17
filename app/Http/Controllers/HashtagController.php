<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use App\Hashtag;
use Auth;
use Illuminate\Http\Request;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        
        $tag= Hashtag::find($id);
        $alltags = Hashtag::where('tag',$tag->tag)->get('post_id')->pluck('post_id')->toArray();
        //dd(array_values($alltags));
         $current_user=Auth::user();
        $userTotalNumPost =  $current_user->postsCount();
        $userTotalNoLikes = $current_user->likesCount();
        $userTotalNocomments = $current_user->commentsCount();
           //isLikedByloggedUser
        $posts=Post::whereIn('id',$alltags)->with(['User','Comments','Hashtags'])->get();
       
        //$posts=Post::with(['User','Comments','Hashtags'])->get();

//'CASE WHEN post.user_id = {$current_user->id} THEN 1 ELSE 0 END) AS is_liked'

      
         
        return view('posts.index',compact('posts','userTotalNumPost','userTotalNoLikes','current_user','userTotalNocomments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
