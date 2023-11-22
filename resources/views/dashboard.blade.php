<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @can('add-posts')
                    <p><a href="{{ route('posts.add-post') }}" class="btn btn-success mb-4">Add new post</a></p>
                @endcan

                <form name="filter_form" id="filter_form" method="get" action="{{ route('dashboard') }}">
                    <div class="form-group mb-2">
                        <label>Search</label>
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control" />
                    </div>
                    <div class="form-group mb-2">
                        <label for="category">Category</label>
                        <select name="category" class="custom-select form-control" style="width:100%;">
                            <option value="">Select...</option>

                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ $category->id == request('category') ? 'selected' : '' }}
                                >{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <input type="submit" value="Search" class="btn btn-primary" />
                    </div>
                </form>

                {{--@can('show-posts')--}}
                    @if(count($posts) > 0)
                        <div class="card-container">
                            @foreach($posts as $post)
                                <div class="card bg-light">
                                    <h5 class="card-header">
                                        {{ $post->title }}
                                        <span style="font-size:12px; float:right;">{{ $post->created_at->diffForHumans() }}</span>
                                    </h5>
                                    <div class="card-body">
                                        <p class="mb-3"><strong>{{ $post->category->title }}</strong></p>
                                        <p class="mb-3">{{ $post->text }}</p>

                                        @can('edit-posts')
                                            <a href="{{ route('posts.edit-post', $post->id) }}" class="btn btn-primary">Edit</a>
                                        @endcan

                                        @can('delete-posts')
                                            <a href="{{ route('posts.delete-post', $post->id) }}" class="btn btn-danger">Delete</a>
                                        @endcan
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <p>{{ $posts->links() }}</p>
                    @else
                        No posts
                    @endif
                {{--@endcan--}}
            </div>
        </div>
    </div>
</x-app-layout>
