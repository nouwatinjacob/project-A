@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
          @include('includes.admin_sidebar')
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Polls</div>
                <div class="card-body ">
                <table class="table table-hover">
                      <thead>
                        <th>
                          Poll Title
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      @if($polls->count() > 0)
                      <tbody>
                       
                          @foreach($polls as $poll)
                          <tr>
                          <td>{{ $poll->title }}</td> 
                                                   
                          <td>                              
                              <a href="" class="btn btn-sm btn-primary">Edit</a>                              
                              <a href="" class="btn btn-sm btn-danger">Delete</a>
                                                         
                          </td>                                                      
                          </tr>
                          @endforeach
                        @else 
                        <tr>
                          <th colspan=5 class="text-center">No Poll registered yet</th>      
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
