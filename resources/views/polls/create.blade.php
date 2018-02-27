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
                        <label for="title">Poll Title</label>                       
                       <input type="text" class="form-control" name="title" placeholder="Enter poll title">
                     </div>
                     <div class="form-group">
                     <label for="poll-item">Poll Items</label> 
                     <div class="input-group control-group after-add-more">                      
                      <input type="text" name="addmore[]" id="poll-item" class="form-control" placeholder="Enter Poll Item">
                      <div class="input-group-btn"> 
                        <button class="btn btn-success add-more" type="button"><i class="fa fa-plus"></i></button>
                      </div>
                    </div>
                    </div>
                    <div class="copy hide">
                      <div class="control-group input-group" style="margin-top:10px">
                        <input type="text" name="addmore[]" class="form-control" placeholder="Enter Other Poll Item">
                        <div class="input-group-btn"> 
                          <button class="btn btn-danger remove" type="button"><i class="fa fa-minus"></i></button>
                        </div>
                      </div>
                    </div><br>
                     <div class="form-group">
                        <label for="title">Start Date</label>                       
                       <input type="date" class="form-control" name="start_date" >
                     </div>
                     <div class="form-group">
                        <label for="title">End Date</label>                       
                       <input type="date" class="form-control" name="end_date">
                     </div>
                     <div class="form-group text-center">
                        <button class="btn btn-success" type="submit">Save Poll</button>
                     </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
