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

                <div class="card-body ">
                <table class="table table-hover">
                      <thead>
                        <th>
                          Name
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      @if($categories->count() > 0)
                      <tbody>
                       
                          @foreach($categories as $category)
                          <tr>
                          <td>{{ $category->name }}</td> 
                                                   
                          <td> 
                                    
                           <form action="{{ route('categories.destroy', ['category' => $category->id])}}" method="POST">
                              <a href="{{ route('categories.edit', ['category' => $category->id])}}" class="btn btn-sm btn-primary">Edit</a>
                              {{csrf_field()}}
                              {{ method_field('DELETE') }}
                              <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                           </form>                              
                          </td>                                                      
                          </tr>
                          @endforeach
                        @else 
                        <tr>
                          <th colspan=5 class="text-center">No Channels registered yet</th>      
                        </tr>                         
                      </tbody>
                      @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection