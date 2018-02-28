<div class="card">
    <div class="card-header">Category</div>

        <div class="card-body">
            <ul class="list-group">
                @foreach($categories as $category)
                <li class="list-group-item">
                    <a href="{{ route('topics.category', ['id' => $category->id])}}">{{ $category->name }}</a>
                    <a href="{{ route('topics.category', ['id' => $category->id])}}"><span class="badge badge-secondary float-right">{{ $category->topics->count()}}</span></a>
                </li>
                @endforeach
            </ul>
        </div>
</div>
<br>
<div class="card">
    <div class="card-header">       
        <h3 class="card-title">
            Poll of the week
        </h3>
    </div>
    @foreach($polls as $poll)
    <form action="" method="POST">    
        <div class="card-body">
            <h5 class="text-center">{{$poll->title}}</h5>
                @foreach($poll->pollItems as $items)            
                <ul class="list-group">
                    <li class="list-group-item">
                       <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios">
                                {{$items->name}}
                            </label>
                        </div>
                    </li>
                </ul>
                @endforeach
               <p class="text-muted text-center">
                Start Date: &nbsp;<span class="fa fa-calendar-alt"> {{ $poll->start_date }}</span>
               </p>
               <p class="text-muted text-center">                
                End Date: &nbsp;<span class="fa fa-calendar-alt"> {{ $poll->end_date }}</span>
               </p>
            <div class="card-footer text-center">
                <button type="button" class="btn btn-success btn-block btn-sm ">Vote</button>
                <a href="#">View Result</a>
            </div>                              
        </div>
    </form><br> 
    @endforeach  
</div>