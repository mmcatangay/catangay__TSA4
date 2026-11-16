@extends('layouts.app')

@section('content')
<h1>{{ $task->title }}</h1>
@if(session('success')) <p>{{ session('success') }}</p> @endif
<p>{{ $task->description ?: 'No description provided.' }}</p>
<p><strong>Assigned to:</strong> {{ $task->assigned_to }}</p>
<p><strong>Status:</strong> {{ ucfirst(str_replace('_', ' ', $task->status)) }}</p>
@if($task->due_date)<p><strong>Due:</strong> {{ $task->due_date->format('M d, Y') }}</p>@endif

@auth
    <a href="{{ route('tasks.edit', $task) }}">Edit</a>
    <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">Archive</button>
    </form>
@endauth
@endsection
