@extends('layouts.app')

@section('content')
<div class="container">
    @include('includes.errors')
    <div class="row">        
        <div class="col-md-8">         
            <div class="card">
                <div class="card-header">
                   Start new Topic 
                </div>

                <div class="card-body">
                    <form action="{{ route('topics.store') }}" method="POST">
                        {{csrf_field()}}

                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                      </div>

                      <div class="form-group">
                        <label for="category">Pick a Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                          <option>--Pick a Category--</option>  
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="content">Description</label>
                        <textarea cols="30" rows="10" class="form-control" name="description" id="description" placeholder="Type your message here"></textarea>
                      </div>

                      <div class="form-group">
                        <button class="btn btn-success float-right" type="submit">Save Discussion</button>
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
