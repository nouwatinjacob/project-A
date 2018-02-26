@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
          @foreach($topics as $topic)
            <div class="card">
                <div class="card-header">
                   <img src="{{ $topic->user->avatar }}" width="35px" height="35px">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{{ route('topics.show', ['id' => $topic->id])}}" class="text-muted">{{ $topic->title }}</a>
                </div>

                <div class="card-body">
                    {{ str_limit($topic->description, 200) }}
                </div>
                <div class="card-footer">
                <i class="fas fa-comment"></i> 500 &nbsp;&nbsp;
                <i class="fas fa-eye"> {{ $topic->view }}</i>  &nbsp;&nbsp;
                <i class="fas fa-clock"></i> {{ $topic->created_at->diffForHumans() }}
                </div>
            </div>
            <br>
          @endforeach

        <div class="justify-content-center">        
            {{ $topics->links() }}
        </div> 

        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Category</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($categories as $category)
                            <li class="list-group-item">
                                {{ $category->name }}
                                <span class="badge badge-secondary pull-right">{{ $category->topics->count()}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
