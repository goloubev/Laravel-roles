<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit post
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form name="form" action="{{ route('posts.update-post', $post) }}" method="post">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ $post->name ?? old('name') }}" class="form-control" />
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="text">Text</label>
                        <textarea name="text" id="text" class="form-control" rows="3">{{ $post->text ?? old('text') }}</textarea>
                        @error('text')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
