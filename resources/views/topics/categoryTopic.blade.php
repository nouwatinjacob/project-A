@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
        <h3 class="text-center">{{ $category->name }}</h3>
          @foreach($topics as $topic)
            <div class="card">                
                <div class="card-header">
                   <img src="{{ asset($topic->user->avatar) }}" width="35px" height="35px">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{{ route('topics.show', ['id' => $topic->id])}}" class="text-muted">{{ $topic->title }}</a>
                </div>

                <div class="card-body">
                    {{ str_limit($topic->description, 200) }}
                </div>
                <div class="card-footer">
                <i class="fas fa-comment"> {{ $topic->replies->count()}}</i> &nbsp;&nbsp;
                <i class="fas fa-eye"> {{ $topic->view }}</i>  &nbsp;&nbsp;
                <i class="fas fa-clock"> {{ $topic->created_at->diffForHumans() }}</i> 
                </div>
            </div>
            <br>
          @endforeach

        <div class="justify-content-center">        
            {{ $topics->links() }}
        </div> 

        </div>
        
        <div class="col-md-4">
            @include('includes.sidebar')
        </div>
    </div>
</div>
@endsection
