<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
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

                <p><a href="{{ route('users.add-user') }}" class="btn btn-success mb-4">Add new user</a></p>

                @if(count($users) > 0)
                    @foreach($users as $user)
                        <div class="card mb-3">
                            <h5 class="card-header">
                                {{ $user->name }}
                                <span style="font-size:12px; float:right;">{{ $user->email }}</span>
                            </h5>
                            <div class="card-body">
                                <p>
                                    <b>Role:</b>
                                    @foreach($user->roles as $role)
                                        {{ $role->name }}
                                    @endforeach
                                </p>
                                <a href="{{ route('users.edit-user', $user->id) }}" class="btn btn-primary">Edit</a>

                                @if($user->email !== auth()->user()->email)
                                    <a href="{{ route('users.delete-user', $user->id) }}" class="btn btn-danger">Delete</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    No users
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
