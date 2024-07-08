<form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="POST" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    @csrf
    @if(isset($user))
        @method('PUT')
    @endif

    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
        <input type="text" class="form-input w-full @error('name') border-red-500 @enderror" id="name" name="name" value="{{ isset($user) ? $user->name : old('name') }}" required>
        @error('name')
            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
        <input type="email" class="form-input w-full @error('email') border-red-500 @enderror" id="email" name="email" value="{{ isset($user) ? $user->email : old('email') }}" required>
        @error('email')
            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
        <input type="password" class="form-input w-full @error('password') border-red-500 @enderror" id="password" name="password" {{ isset($user) ? '' : 'required' }}>
        @error('password')
            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirm Password</label>
        <input type="password" class="form-input w-full @error('password_confirmation') border-red-500 @enderror" id="password_confirmation" name="password_confirmation" {{ isset($user) ? '' : 'required' }}>
        @error('password_confirmation')
            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="roles" class="block text-gray-700 font-bold mb-2">Roles</label>
        <select name="roles[]" id="roles" class="form-input w-full @error('roles') border-red-500 @enderror" multiple required>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ isset($user) && $user->roles->pluck('id')->contains($role->id) ? 'selected' : '' }}>{{ $role->display_name }}</option>
            @endforeach
        </select>
        @error('roles')
            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        {{ isset($user) ? 'Update' : 'Create' }}
    </button>
</form>
