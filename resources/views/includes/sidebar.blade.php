<div class="card">
                <div class="card-header">Category</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($categories as $category)
                            <li class="list-group-item">
                                {{ $category->name }}
                                <span class="badge badge-secondary float-right">{{ $category->topics->count()}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>