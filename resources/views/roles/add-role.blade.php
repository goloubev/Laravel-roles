<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add new role
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

                <form name="form" action="{{ route('roles.store-role') }}" method="post">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Role name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" />
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Permissions</label>

                        @foreach($permissions as $permission)
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    name="permissions[]"
                                    id="permission_{{ $permission->id }}"
                                    value="{{ $permission->id }}"
                                    class="form-check-input"
                                    {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}
                                />
                                <label for="permission_{{ $permission->id }}" class="form-check-label">{{ $permission->name }}</label>
                            </div>
                        @endforeach

                        @error('permissions')
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
