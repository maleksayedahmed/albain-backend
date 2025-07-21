@extends('layouts.admin')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Create Permission</h1>
    <form action="{{ route('admin.permissions.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block font-bold">Permission Name</label>
            <input type="text" name="name" id="name" class="form-input w-full" value="{{ old('name') }}" required>
            @error('name')<div class="text-red-500">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection 