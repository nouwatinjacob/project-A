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
                <form action="" method="POST">
                     {{csrf_field()}}

                     <div class="form-group">
                        <label for="title">Poll Title</label>                       
                       <input type="text" class="form-control" name="name" placeholder="Enter poll title">
                     </div>
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
