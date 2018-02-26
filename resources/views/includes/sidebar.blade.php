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