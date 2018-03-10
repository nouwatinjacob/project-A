@extends('layouts.apps')

@section('content')

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12">                
                <div class="pull-left">            
                {{ $topics->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <!-- POSTS -->
                            @foreach($topics as $topic)
                            <div class="post">
                                <div class="wrap-ut pull-left">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img src="{{ asset($topic->user->avatar) }}" alt="$topic->user->avatar" width="35px" height="35px"/>
                                            <div class="status green">&nbsp;</div>
                                        </div>

                                        <div class="icons">
                                            <img src="images/icon1.jpg" alt="" /><img src="images/icon4.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <h2><a href="{{ route('topic.show', ['id' => $topic->id])}}">{{ $topic->title }}</a></h2>
                                        <p>{{ str_limit($topic->description, 200) }}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="postinfo pull-left">
                                    <div class="comments">
                                        <div class="commentbg">
                                        {{ $topic->replies->count()}}
                                            <div class="mark"></div>
                                        </div>

                                    </div>
                                    <div class="views"><i class="fa fa-eye"></i> {{ $topic->view }}</div>
                                    <div class="time"><i class="fa fa-clock-o"></i> {{ $topic->created_at->diffForHumans() }}</div>                                    
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endforeach
                            <!-- POSTS -->

                        </div>

                        <!-- SIDEBAR -->
                        <div class="col-lg-4 col-md-4">
                            @include('includes.t-sidebar')  
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xs-12">                
                            <div class="pull-left">            
                            {{ $topics->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>


            </section>

@endsection