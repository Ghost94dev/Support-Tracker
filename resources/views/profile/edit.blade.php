@extends('layouts.app')

@section('content')
<h3 class="mb-4">My Profile</h3>

<form method="POST" action="{{ route('profile.update') }}" class="card p-4 shadow-sm">
    @csrf
    @method('PATCH')

    <!-- Name -->
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name', auth()->user()->name) }}"
               required>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email"
               name="email"
               class="form-control"
               value="{{ old('email', auth()->user()->email) }}"
               required>
    </div>

    <!-- Department -->
    <div class="mb-3">
        <label class="form-label">Department</label>
        <input type="text"
               name="department"
               class="form-control"
               value="{{ old('department', auth()->user()->department) }}">
    </div>

    <!-- Role (admin only) -->
    @if(auth()->user()->role === 'admin')
    <div class="mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-select">
            <option value="staff" @selected(auth()->user()->role === 'staff')>Staff</option>
            <option value="admin" @selected(auth()->user()->role === 'admin')>Admin</option>
        </select>
    </div>
    @endif

    <button class="btn btn-primary">Save Profile</button>
</form>
@endsection
