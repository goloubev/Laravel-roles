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

                {{--@can('show-posts')--}}
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                            <div class="card mb-3">
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
                    @else
                        No posts
                    @endif
                {{--@endcan--}}
            </div>
        </div>
    </div>
</x-app-layout>
