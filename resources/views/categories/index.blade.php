@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
          @include('includes.admin_sidebar')
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
                                    
                           
                              <a href="{{ route('categories.edit', ['category' => $category->id])}}" class="btn btn-sm btn-primary">Edit</a>
                              
                              <a href="{{ route('categories.destroy', ['category' => $category->id])}}" class="btn btn-sm btn-danger">Delete</a>
                                                         
                          </td>                                                      
                          </tr>
                          @endforeach
                        @else 
                        <tr>
                          <th colspan=5 class="text-center">No Category registered yet</th>      
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
