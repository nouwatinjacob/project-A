@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <img src="{{ asset($topic->user->avatar) }}" alt="{{ $topic->user->avatar }}" width="35px" height="35px">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="" class="text-muted">{{ $topic->title }}</a>
                </div>

                <div class="card-body">
                    {{ $topic->description }}
                </div>
                <div class="card-footer">
                <a href="{{ route('topic.like', ['id' => $topic->id])}}"><i class="fas fa-thumbs-up text-success"> {{ $likes }}</i></a>  &nbsp;&nbsp;
                <a href="{{ route('topic.unlike', ['id' => $topic->id])}}"><i class="fas fa-thumbs-down text-danger"> {{ $unlikes }}</i></a>  &nbsp;&nbsp;
                <i class="fas fa-clock text-muted"> Posted on: {{ $topic->created_at->diffForHumans() }}</i>
                </div>
            </div>
          <br>
          <h3 class="">Reply</h3>  
            @foreach($replies as $reply)
            <div class="card">
                <div class="card-header">
                   <img src="{{ asset($reply->user->avatar) }}" alt="{{ $reply->user->avatar }}" width="35px" height="35px">
                </div>

                <div class="card-body">
                    {{ $reply->content }}
                </div>
                <div class="card-footer">
                <i class="fas fa-thumbs-up text-success"> 10</i>  &nbsp;&nbsp;
                <i class="fas fa-thumbs-down text-danger"> 3</i>  &nbsp;&nbsp;
                <i class="fas fa-clock text-muted"> Posted on: {{ $reply->created_at->diffForHumans() }}</i>
                </div>
            </div>
            <br>
            @endforeach

            <div class="card">
                <div class="card-header">
                    Post a Reply
                </div>
                <div class="card-body">
                    <form action="{{ route('reply.store', ['id' => $topic->id])}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">                            
                            <textarea cols="20" rows="5" class="form-control" name="content" id="content" placeholder="Type your message here"></textarea>
                        </div>

                      <div class="form-group">
                        <button class="btn btn-success float-right" type="submit">Post Reply</button>
                      </div>
                    </form>
                </div>
            </div>    

        </div>
        
        <div class="col-md-4">
            @include('includes.sidebar')
        </div>
    </div>
</div>
@endsection
