<?php

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tasks = Task::all(); // Ambil semua tugas dari database
        return view('tasks.index', compact('tasks')); // Kirimkan variabel ke view
    }

    /**
     * Show the form for creating a new task.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    
     public function store(Request $request)
     {
        

         // Memastikan pengguna terautentikasi
         if (!$request->user()) {
             Log::error('User not authenticated.');
             return redirect()->route('login')->withErrors('You must be logged in to create a task.');
         }
 
         $task = new Task();
         $task->title = $request->input('title');
         $task->user_id = $request->user()->id; // Mengambil ID pengguna yang terautentikasi
 
         // Menambahkan log untuk debugging
         Log::info($task->toArray());
 
         // Menyimpan task ke database
         $task->save();
 
         // Kembali ke halaman dengan pesan sukses
         return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
     }


    /**
     * Display the specified task.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $task = Task::findOrFail($id); // Mengambil tugas berdasarkan ID
        return view('tasks.show', compact('task')); // Mengirim variabel $task ke tampilan
    }


    /**
     * Show the form for editing the specified task.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id); // Pastikan Anda menggunakan model yang benar
        return view('tasks.edit', compact('task')); // Mengirimkan variabel task ke view
    }


    /**
     * Update the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
            'due_date' => 'nullable|date',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified task from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
