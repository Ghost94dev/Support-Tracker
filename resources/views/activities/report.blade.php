@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Activity Report</h4>

    <!-- Date filter form -->
    <form method="GET" class="row mb-3">
        <div class="col">
            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
        </div>
        <div class="col">
            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>
        <div class="col">
            <button class="btn btn-secondary">Filter</button>
        </div>
    </form>

    @foreach($updates as $u)
    <div class="border p-2 mb-2">
        <strong>{{ $u->activity->title }}</strong><br>
        Status: {{ ucfirst($u->status) }} —
        Updated by: {{ $u->user->name }} —
        {{ $u->updated_at }}<br>
        Remarks: {{ $u->remarks }}
    </div>
    @endforeach
</div>
@endsection
