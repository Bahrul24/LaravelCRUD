@extends('layouts.main')

@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>Status: {{ ucfirst($task->status) }}</p> <!-- Gunakan ucfirst agar status lebih rapi -->
    <p>Batas Waktu: {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</p> <!-- Format tanggal agar lebih rapi -->
    <a href="{{ route('tasks.edit', $task->id) }}">Edit</a> <!-- Pastikan ID diberikan di route -->

    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')"> <!-- Tambahkan konfirmasi penghapusan -->
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
@endsection
