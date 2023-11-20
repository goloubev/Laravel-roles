<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
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

                <p><a href="{{ route('roles.add-role') }}" class="btn btn-success mb-4">Add new role</a></p>

                @if(count($roles) > 0)
                    @foreach($roles as $role)
                        <div class="card mb-3">
                            <h5 class="card-header">{{ $role->name }}</h5>
                            <div class="card-body">
                                <a href="{{ route('roles.edit-role', $role->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('roles.delete-role', $role->id) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    No roles
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
