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

    <form >    
        <div class="card-body">
            <h5 class="text-center">Who is the All Time Best Footballer?</h5>            
                <ul class="list-group">
                    <li class="list-group-item">
                       <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios">
                                Good
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios">
                                Excellent
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios">
                                Bed
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios">
                                Can Be Improved
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios">
                                No Comment
                           </label>
                        </div> 
                    </li>
                </ul>
            <div class="card-footer text-center">
                <button type="button" class="btn btn-success btn-block btn-sm ">Vote</button>
                <a href="#">View Result</a>
            </div>                        
        </div>
        
</div>