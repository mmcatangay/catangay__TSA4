@extends('layouts.app')

@section('content')
<h1>Create Task</h1>
<form method="POST" action="{{ route('tasks.store') }}">
    @include('tasks._form', ['buttonText' => 'Save task'])
</form>
@endsection
