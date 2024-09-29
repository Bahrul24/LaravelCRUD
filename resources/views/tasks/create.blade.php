@extends('layouts.main')

@section('content')
    <h1>Buat Tugas Baru</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Judul" required>
        <textarea name="description" placeholder="Deskripsi"></textarea>
        <input type="text" name="status" placeholder="Status" required>
        <input type="date" name="due_date">
        <button type="submit">Simpan</button>
    </form>
@endsection
