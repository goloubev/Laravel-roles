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

                <a href="{{ route('add-post') }}" class="btn btn-success mb-4">Add new post</a>

                @foreach($posts as $post)
                    <div class="card mb-3">
                        <h5 class="card-header">{{ $post->name }} ({{ $post->created_at->diffForHumans() }})</h5>
                        <div class="card-body">
                            <p class="mb-3">{{ $post->text }}</p>
                            <a href="{{ route('edit-post', $post->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('delete-post', $post->id) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
