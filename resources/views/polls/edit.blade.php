@extends('layouts.app')

@section('content')
<div class="container">
  @include('includes.errors')
    <div class="row">
        <div class="col-md-4">
          @include('includes.admin_sidebar')
        </div>

        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Create new Poll</div>

              <div class="card-body">
                <form action="{{ route('polls.store')}}" method="POST">
                     {{csrf_field()}}

                     <div class="form-group">
                        <label for="title">{{$poll->title}}</label>                       
                       <input type="text" class="form-control" name="title" placeholder="Enter poll title">
                     </div>
                     <div class="form-group">
                     <label for="poll-item">Poll Items</label> 
                      @foreach($poll->pollItems as $pollItem)                                          
                        <input type="text" name="addmore[]" id="poll-item" class="form-control" placeholder="Enter Poll Item">                      
                      @endforeach
                    </div>
                    </div>
                    
                     <div class="form-group">
                        <label for="title">Start Date</label>                       
                       <input type="date" class="form-control" name="{{ $poll->start_date }}" placeholder="{{ $poll->start_date }}" >
                     </div>
                     <div class="form-group">
                        <label for="title">End Date</label>                       
                       <input type="date" class="form-control" name="{{ $poll->end_date }}" placeholder="{{ $poll->end_date }}">
                     </div>
                     <div class="form-group text-center">
                        <button class="btn btn-success" type="submit">Update Poll</button>
                     </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
