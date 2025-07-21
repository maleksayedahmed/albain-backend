<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        if (!can('عرض مستخدم')) abort(403);
        $permissions = Permission::paginate(10);
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        if (!can('إضافة مستخدم')) abort(403);
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        if (!can('إضافة مستخدم')) abort(403);
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
        Permission::create(['name' => $request->name]);
        return redirect()->route('admin.permissions.index')->with('success', 'Permission created successfully.');
    }

    public function show(Permission $permission)
    {
        if (!can('عرض مستخدم')) abort(403);
        return view('admin.permissions.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        if (!can('تعديل مستخدم')) abort(403);
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        if (!can('تعديل مستخدم')) abort(403);
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
        ]);
        $permission->update(['name' => $request->name]);
        return redirect()->route('admin.permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        if (!can('حذف مستخدم')) abort(403);
        $permission->delete();
        return redirect()->route('admin.permissions.index')->with('success', 'Permission deleted successfully.');
    }
} 