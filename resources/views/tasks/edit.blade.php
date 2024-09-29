@extends('layouts.main')

@section('content')
    <h1>Edit Tugas</h1>
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $task->title }}" required>
        <textarea name="description">{{ $task->description }}</textarea>
        <input type="text" name="status" value="{{ $task->status }}" required>
        <input type="date" name="due_date" value="{{ $task->due_date }}">
        <button type="submit">Perbarui</button>
    </form>
@endsection
