@extends('layouts.main')

@section('content')
    <h1>Daftar Tugas</h1>
    <a href="{{ route('tasks.create') }}">Buat Tugas Baru</a>
    <ul>
        @foreach ($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
