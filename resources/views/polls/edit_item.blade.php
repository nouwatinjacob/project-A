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
              <div class="card-header">Edit Item</div>

              <div class="card-body">
                <form action="{{ route('items.update', ['id' => $item->id]) }}" method="POST">
                     {{csrf_field()}}

                     <div class="form-group">
                        <label for="title">Item Name</label>                       
                       <input type="text" class="form-control" name="name" value="{{ $item->name }}" placeholder="{{ $item->name }}">
                     </div>
                                          
                     <div class="form-group text-center">
                        <button class="btn btn-success" type="submit">Update Item</button>
                     </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
