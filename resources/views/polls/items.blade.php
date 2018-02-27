@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
          @include('includes.admin_sidebar')
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  Polls
                  <a href="{{ route('items.create', ['id' => $poll->id]) }}" class="btn btn-success btn-sm float-right">Add Item</a>
                </div>
                <div class="card-body ">
                <table class="table table-hover">
                      <thead>
                        <th>
                          Item Name
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      @if($poll->pollItems->count() > 0)
                      <tbody>
                        
                          @foreach($poll->pollItems as $item)
                          <tr>
                          <td>{{ $item->name }}</td> 
                                                   
                          <td>
                                                            
                              <a href="{{ route('items.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-primary">Edit</a>                              
                              <a href="{{ route('items.delete', ['id' => $item->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                                                         
                          </td>                                                      
                          </tr>
                          @endforeach
                        @else 
                        <tr>
                          <th colspan=5 class="text-center">No Poll Items registered yet</th>      
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
