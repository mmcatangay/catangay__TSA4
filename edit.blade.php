@extends('layouts.app')

@section('content')
<h1>Edit Task</h1>
<form method="POST" action="{{ route('tasks.update', $task) }}">
    @method('PUT')
    @include('tasks._form', ['buttonText' => 'Update task'])
</form>
@endsection
