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
    <div class="card-header">Poll of the week</div>

        <div class="card-body">
            <form >
                <h6 class="text-center">Who is the All time Best Footballer </h6>
                <div class="form-group">
                    <label class="form-control">Cristiano Ronaldo <input type="checkbox" class="float-right"></label>
                    <label class="form-control">Lionel Messi <input type="checkbox" class="float-right"></label>
                    <label class="form-control">Ronaldinho <input type="checkbox" class="float-right"></label>
                </div>
                <p class="text-muted">Poll ends 20th December</p>
                <div class="form-group">
                    <button class="btn btn-success float-right mr-5">Vote</button>
                </div>
            </form>            
        </div>
</div>