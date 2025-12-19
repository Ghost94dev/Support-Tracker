@extends('layouts.app')

@section('content')
<div class="container">

<a href="{{ route('activities.create') }}" class="btn btn-primary mb-4">
    ➕ New Activity
</a>

<h4 class="mb-3">Today's Activities</h4>

@foreach($activities as $activity)
<div class="card mb-3 shadow-sm">
    <div class="card-header">
        <strong>{{ $activity->title }}</strong>
        <span class="text-muted float-end">{{ $activity->activity_date->format('d-m-Y') }}</span>
    </div>
    <div class="card-body">
        <p>{{ $activity->description }}</p>

        <!-- Update form -->
        <form method="POST" action="{{ route('activities.update', $activity) }}" class="row g-2 align-items-center mb-3">
            @csrf
            <div class="col-auto">
                <select name="status" class="form-select">
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="done">Done</option>
                </select>
            </div>
            <div class="col">
                <input name="remarks" class="form-control" placeholder="Add remarks">
            </div>
            <div class="col-auto">
                <button class="btn btn-success">Update</button>
            </div>
        </form>

        <!-- Updates list -->
        <h6>Updates:</h6>
        @forelse($activity->updates as $u)
        <div class="border p-2 mb-2 rounded bg-light">
            <strong>{{ $u->user->name }}</strong> —
            <span class="badge bg-info text-dark">{{ ucfirst($u->status) }}</span> —
            <small>{{ $u->updated_at->format('d-m-Y H:i:s') }}</small>
            <p class="mb-0">{{ $u->remarks }}</p>
        </div>
        @empty
        <p class="text-muted">No updates yet</p>
        @endforelse
    </div>
</div>
@endforeach

</div>
@endsection
