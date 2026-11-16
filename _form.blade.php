@csrf

<div>
    <label for="title">Title</label>
    <input id="title" name="title" value="{{ old('title', $task->title ?? '') }}" required maxlength="120">
    @error('title') <small>{{ $message }}</small> @enderror
</div>

<div>
    <label for="description">Description</label>
    <textarea id="description" name="description" rows="5">{{ old('description', $task->description ?? '') }}</textarea>
    @error('description') <small>{{ $message }}</small> @enderror
</div>

<div>
    <label for="assigned_to">Assigned to</label>
    <input id="assigned_to" name="assigned_to" value="{{ old('assigned_to', $task->assigned_to ?? '') }}" required maxlength="120">
    @error('assigned_to') <small>{{ $message }}</small> @enderror
</div>

<div>
    <label for="status">Status</label>
    <select id="status" name="status" required>
        @foreach(['pending' => 'Pending', 'in_progress' => 'In progress', 'done' => 'Done'] as $value => $label)
            <option value="{{ $value }}" @selected(old('status', $task->status ?? 'pending') === $value)>{{ $label }}</option>
        @endforeach
    </select>
    @error('status') <small>{{ $message }}</small> @enderror
</div>

<div>
    <label for="due_date">Due date</label>
    <input id="due_date" type="date" name="due_date" value="{{ old('due_date', isset($task) && $task->due_date ? $task->due_date->format('Y-m-d') : '') }}">
    @error('due_date') <small>{{ $message }}</small> @enderror
</div>

<button type="submit">{{ $buttonText }}</button>
