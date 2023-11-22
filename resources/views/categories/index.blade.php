<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
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

                <p><a href="{{ route('categories.add-category') }}" class="btn btn-success mb-4">Add new category</a></p>

                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <div class="card mb-3">
                            <h5 class="card-header">{{ $category->title }}</h5>
                            <div class="card-body">
                                <a href="{{ route('categories.edit-category', $category->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('categories.delete-category', $category->id) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    No categories
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
