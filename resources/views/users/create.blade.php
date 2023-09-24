<x-app-layout>
    <div class="text-slate-400 p-4">
    <h3>Create user</h3>

    @if ($errors->any()) 
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                @if ($errors->has('avatar'))
                    <li>The avatar dimensions must be 200x200 pixels</li>
                @endif
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="post" 
        enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" 
                value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="alias" class="form-label">Alias</label>
            <input type="text" class="form-control" name="alias" 
                value="{{ old('alias') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email"
                value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" class="form-control" name="avatar">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    </div>
</x-app-layout>
