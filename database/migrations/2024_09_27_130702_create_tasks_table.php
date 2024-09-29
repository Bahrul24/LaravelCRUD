<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('status');
            $table->date('due_date')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->string('status')->default('pending'); // atau
            $table->string('status')->nullable();
            $task = new Task();
            $task->title = 'Your Task Title'; // Ganti dengan judul yang diinginkan
            $task->user_id = $userId; // Ganti dengan ID pengguna yang sesuai
            $task->save();
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
