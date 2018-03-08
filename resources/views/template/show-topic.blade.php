@extends('layouts.apps')

@section('content')
<section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 breadcrumbf">
                            <a href="#">Borderlands 2</a> <span class="diviver">&gt;</span> <a href="#">General Discussion</a> <span class="diviver">&gt;</span> <a href="#">Topic Details</a>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">

                            <!-- POST -->
                            <div class="post beforepagination">
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img src="{{ asset($topic->user->avatar)}}" alt="{{$topic->user->avatar}}" width="35px" height="35px"/>
                                            <div class="status green">&nbsp;</div>
                                        </div>

                                        <div class="icons">
                                            <img src="{{ asset('images/icon1.jpg') }}" alt="" /><img src="{{ asset('images/icon4.jpg') }}" alt="" /><img src="{{ asset('images/icon5.jpg') }}" alt="" /><img src="{{ asset('images/icon6.jpg') }}" alt="" />
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <h2>{{ $topic->title}}</h2>
                                        <p>{{ $topic->description }}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>                              
                                <div class="postinfobot">

                                    <div class="likeblock pull-left">
                                        <a href="{{ route('topic.like', ['id' => $topic->id])}}" class="up"><i class="fa fa-thumbs-o-up"></i>{{ $topic_likes }}</a>
                                        <a href="{{ route('topic.unlike', ['id' => $topic->id])}}" class="down"><i class="fa fa-thumbs-o-down"></i>{{ $topic_unlikes }}</a>
                                    </div>

                                    <div class="prev pull-left">                                        
                                        <a href="#"><i class="fa fa-reply"></i></a>
                                    </div>

                                    <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted : {{ $topic->created_at->diffForHumans() }}</div>

                                    <div class="next pull-right">                                        
                                        <a href="#"><i class="fa fa-share"></i></a>

                                        <a href="#"><i class="fa fa-flag"></i></a>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- POST -->

                            @include('includes.t-pagination')

                            <!-- Replies -->
                            @foreach($replies as $reply)
                            <div class="post">
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img src="{{ asset($reply->user->avatar) }}" alt="{{ $reply->user->avatar }}" width="35px" height="35px" />
                                            <div class="status red">&nbsp;</div>
                                        </div>

                                        <div class="icons">
                                            <img src="{{ asset('images/icon3.jpg') }}" alt="" /><img src="{{ asset('images/icon4.jpg') }}" alt="" /><img src="{{ asset('images/icon5.jpg') }}" alt="" /><img src="{{ asset('images/icon6.jpg') }}" alt="" />
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <p>{{ $reply->content }}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>                              
                                <div class="postinfobot">

                                    <div class="likeblock pull-left">
                                        <a href="{{ route('reply.like', ['id' => $reply->id])}}" class="up"><i class="fa fa-thumbs-o-up"></i>{{ $reply->replyLikes()->where('like', 1)->count() }}</a>
                                        <a href="{{ route('reply.unlike', ['id' => $reply->id])}}" class="down"><i class="fa fa-thumbs-o-down"></i>{{ $reply->replyLikes()->where('like', 0)->count() }}</a>
                                    </div>

                                    <div class="prev pull-left">                                        
                                        <a href="#"><i class="fa fa-reply"></i></a>
                                    </div>

                                    <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted : {{ $reply->created_at->diffForHumans() }}</div>

                                    <div class="next pull-right">                                        
                                        <a href="#"><i class="fa fa-share"></i></a>

                                        <a href="#"><i class="fa fa-flag"></i></a>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Replies -->


                            @if(Auth::check())
                            <!-- REply Form -->
                            <div class="post">
                                <form action="{{route('reply.store', ['id' => $topic->id])}}" class="form" method="post">
                                  {{csrf_field()}}
                                    <div class="topwrap">
                                        <div class="userinfo pull-left">
                                            <div class="avatar">
                                                <img src="{{ asset(Auth::user()->avatar)}}" alt="{{Auth::user()->avatar}}" width="35px" height="35px"/>
                                                <div class="status red">&nbsp;</div>
                                            </div>

                                            <div class="icons">
                                                <img src="{{ asset('images/icon3.jpg" alt="" /><img src="images/icon4.jpg" alt="" /><img src="images/icon5.jpg" alt="" /><img src="images/icon6.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="posttext pull-left">
                                            <div class="textwraper">
                                                <div class="postreply">Post a Reply</div>
                                                <textarea name="content" id="reply" placeholder="Type your message here"></textarea>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>                              
                                    <div class="postinfobot">

                                        <div class="notechbox pull-left">
                                            <input type="checkbox" name="note" id="note" class="form-control" />
                                        </div>

                                        <div class="pull-left">
                                            <label for="note"> Email me when some one post a reply</label>
                                        </div>

                                        <div class="pull-right postreply">
                                            <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                            <div class="pull-left"><button type="submit" class="btn btn-primary">Post Reply</button></div>
                                            <div class="clearfix"></div>
                                        </div>


                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                            <!-- Reply Form -->                            
                            @endif


                        </div>
                        <!-- SIDEBAR -->
                        <div class="col-lg-4 col-md-4">
                            @include('includes.t-sidebar')  
                        </div>
                    </div>
                </div>


</section>
@endsection