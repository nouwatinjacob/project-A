@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('categories')}}">Category</a></li>
                <li class="list-group-item"><a href="{{ route('categories.create')}}">Create a new Category</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Category</div>

              <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                     {{csrf_field()}}

                     <div class="form-group">
                       
                       <input type="text" class="form-control" name="name" placeholder="Enter Category name">
                     </div>
                     <div class="form-group text-center">
                        <button class="btn btn-success" type="submit">Save Channel</button>
                     </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
