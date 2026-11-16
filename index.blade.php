@extends('layouts.app')

@section('content')
<h1>Tasks for Today</h1>

@if(session('success')) <p>{{ session('success') }}</p> @endif

@auth
    <p><a href="{{ route('tasks.create') }}">Create a task</a></p>
@endauth

@forelse($tasks as $task)
    <article>
        <h2><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></h2>
        <p>{{ ucfirst(str_replace('_', ' ', $task->status)) }} · {{ $task->assigned_to }}</p>
        @if($task->due_date)<p>Due {{ $task->due_date->format('M d, Y') }}</p>@endif
    </article>
@empty
    <p>No active tasks yet.</p>
@endforelse

{{ $tasks->links() }}
@endsection
