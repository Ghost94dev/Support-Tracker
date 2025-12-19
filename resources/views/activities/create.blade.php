@extends('layouts.app')

@section('content')
<div class="container">
<h4>Create Activity</h4>

<form method="POST" action="{{ route('activities.store') }}">
@csrf

<input name="title" class="form-control mb-2" placeholder="Activity title" required>
<textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>

<button class="btn btn-primary">Save</button>
</form>
</div>
@endsection
