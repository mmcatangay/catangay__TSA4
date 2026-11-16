<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Mail\TaskCompleted;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::visible()->latest()->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request): RedirectResponse
    {
        Task::create($request->validated());

        return to_route('tasks.index')->with('success', 'Task created.');
    }

    public function show(Task $task): View
    {
        abort_if($task->is_archived, 404);

        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task): View
    {
        abort_if($task->is_archived, 404);

        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task): RedirectResponse
    {
        abort_if($task->is_archived, 404);

        $wasDone = $task->status === 'done';
        $task->update($request->validated());

        if (! $wasDone && $task->status === 'done') {
            Mail::to(config('tasks.notification_recipient'))
                ->send(new TaskCompleted($task));
        }

        return to_route('tasks.show', $task)->with('success', 'Task updated.');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->update(['is_archived' => true]);

        return to_route('tasks.index')->with('success', 'Task archived.');
    }
}
