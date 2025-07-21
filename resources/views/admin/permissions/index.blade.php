@extends('layouts.admin')
@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Permissions</h1>
            <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary">Add Permission</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ route('admin.permissions.show', $permission) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('admin.permissions.edit', $permission) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $permissions->links() }}</div>
    </div>
@endsection
