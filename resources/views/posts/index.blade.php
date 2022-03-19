<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        body {
            background-color: #eeeeee;
        }

        .h7 {
            font-size: 0.8rem;
        }

        .gedf-wrapper {
            margin-top: 0.97rem;
        }

        @media (min-width: 992px) {
            .gedf-main {
                padding-left: 4rem;
                padding-right: 4rem;
            }
            .gedf-card {
                margin-bottom: 2.77rem;
            }
        }

        /**Reset Bootstrap*/
        .dropdown-toggle::after {
            content: none;
            display: none;
        }
    </style>
</head>
<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
        

 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        
<nav class="navbar navbar-light bg-white">
        <a href="#" class="navbar-brand">Bootsbook</a>
        <form class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="button-addon2">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </nav>


    <div class="container-fluid gedf-wrapper">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="h5">@ {{$current_user->email}}</div>
                        <div class="h7 text-muted">Fullname : {{$current_user->name}}</div>
                        <div class="h7">Developer of web applications, JavaScript, PHP, Java, Python, Ruby, Java, Node.js,
                            etc.
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="h6 text-muted">Posts</div>
                            <div class="h5">{{$userTotalNumPost}}</div>
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted">Likes</div>
                            <div class="h5">{{$userTotalNoLikes}}</div>
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted">Comments</div>
                            <div class="h5">{{$userTotalNocomments}}</div>
                        </li>


                        
                       
                    </ul>
                </div>
            </div>
            <div class="col-md-6 gedf-main">

                <!--- \\\\\\\Post-->
                @if(Auth::check())
                    <div class="card gedf-card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make
                                        a Post</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Images</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                    <div class="form-group">
                                        <label class="sr-only" for="title">post</label>
                                        <input class="form-control" id="title"  placeholder="title" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="description">post</label>
                                        <textarea class="form-control" id="description" name='description' rows="3" placeholder="What are you thinking?"></textarea>
                                    </div>
                                     <div class="form-group">
                                        <label class="sr-only" for="tags">post</label>
                                        <input class="form-control" id="tags"  placeholder="comma separeted tags" name="tags">
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" >
                                            <label class="custom-file-label" for="customFile">Upload image</label>
                                        </div>
                                    </div>
                                    <div class="py-4"></div>
                                </div>
                            </div>
                            <div class="btn-toolbar justify-content-between">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary" id="post_share">share</button>
                                </div>
                                <div class="btn-group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-globe"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Public</a>
                                        <a class="dropdown-item" href="#"><i class="fa fa-users"></i> Friends</a>
                                        <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Just me</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endif
                <!-- Post /////-->
                @foreach($posts as $post)
                <!--- \\\\\\\Post-->
                <div class="card gedf-card  postDiv">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">@ {{$post->User->email}}</div>
                                    <div class="h7 text-muted">{{$post->User->name}}</div>
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                        <div class="h6 dropdown-header">Configuration</div>
                                        @if(Auth::id()== $post->user_id)
                                        <a class="dropdown-item delete-btn" href="" data-postId='{{$post->id}}'>Delete</a>
                                        @endif
                                        <a class="dropdown-item" href="#">Hide</a>
                                        <a class="dropdown-item" href="#">Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> 10 min ago</div>
                        <a class="card-link" href="#">
                            <h5 class="card-title"> {{$post->title}}</h5>
                        </a>

                        <p class="card-text">
                            {{$post->description}}
                        </p>
                        <div>
                            @foreach($post->hashtags as $tag)
                                    <a href="/hashtag/{{$tag->id}}">
                                        <span class="badge badge-primary">{{$tag->tag}}</span>
                                    </a>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="like-btn card-link" data-PostId='{{$post->id}}'>
                            <i class="fa fa-gittip" ></i> Like</a>
                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                        <textarea class="form-control" class="comment" data-postId='{{$post->id}}' name='comment' rows="3" placeholder="Leave a comment"></textarea>
                         
                        </div>
                        <div class="input-group-append col-md-1">
                            <button class="btn btn-outline-primary comment_btn" type="button" >
                                send
                            </button>    
                    </div>
                    </div>
                     <ul class="list-group list-group-flush">
                        @foreach($post->comments as $comment)
                        <li class="list-group-item">
                            
                            <div class="h5">@ {{$comment->User->email}}</div>
                               
                            <div class="h5">{{$comment->comment}}</div>
    
                           
                        </li>
                            
                        @endforeach
                       
                    </ul>
                </div>
                <!-- Post /////-->

                @endforeach





            </div>
         
        </div>
    </div>

<script type="text/javascript">
        $( document ).ready(function() {


            $(".like-btn").each(function() {

                var btn = $(this);
                var formData = {postId:btn.attr('data-postId'),  "_token": "{{ csrf_token() }}"}; 
                var icon=btn.find("i");
                var liked = 0;
                
                $.ajax({
                    type: "POST",
                    url: "{{route('post.likedcheck')}}",
                    data: formData,
                    success: function(data) {
                        if(data.liked)
                         icon.css("color", "red");
                    }
                });
            })
                

           
           
        });

        $(".like-btn").click(function(event) {
            
            event.preventDefault();
            var el =$(this);
            var postId = $(this).attr('data-postId');
            var formData = {postId:postId,  "_token": "{{ csrf_token() }}"}; 
            var icon=el.find("i");
            $.ajax({
                url : "{{route('post.like')}}",
                type: "post",
                data : formData,
                success: function(data, textStatus, jqXHR)
                {
                    if(data.liked)
                        icon.css("color", "red");
                    else
                        icon.css("color", "");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    return;
                }
            });
     
      });

     $( ".comment_btn" ).click(function() {
       var textArea =$(this).parent().parent().find("textarea");
       var comment = textArea.val(); 
       var postId = (textArea[0]).dataset.postid;
       
        if(comment == "" ) {return;}
        var formData = {comment:comment,postId:postId,  "_token": "{{ csrf_token() }}",}; 
        
        $.ajax({
            url : "{{route('post.comment')}}",
            type: "POST",
            data : formData,
            success: function(data, textStatus, jqXHR)
            {

               
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                return;
            }
        });
        $(this).parent().parent().parent().find("ul").append('<li class="list-group-item"><div class="h5">'+"@ {{Auth::user()->email}}"+'</div><div class="h5">'+comment+'</div></li>');
      });
    $( "#post_share " ).click(function() {
        //$(this).attr('disabled', 'disabled');
        var input_title = $("#title").val()
        var input_description = $("#description").val()
        var input_tags = $("#tags").val()
        

        if(input_title == "" || input_description=="") {return;}
        var formData = {description:input_description,
            title:input_title,tags:input_tags,  "_token": "{{ csrf_token() }}",}; 
        
        $.ajax({
            url : "{{route('post.store')}}",
            type: "POST",
            data : formData,
            success: function(data, textStatus, jqXHR)
            {
               location.reload();
               // $(this).attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
         
            }
        });  
    });



     $( ".delete-btn" ).click(function(event) {
        event.preventDefault();
        var el =$(this);
        var postId = $(this).attr('data-postId')
        var formData = {postId:postId,  "_token": "{{ csrf_token() }}",}; 
        
        $.ajax({
            url : "{{route('post.delete')}}",
            type: "delete",
            data : formData,
            success: function(data, textStatus, jqXHR)
            {
                el.closest('.postDiv').remove();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                return;
            }
        });
        
    });
    

</script>




</body>
</html>