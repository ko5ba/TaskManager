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
        Schema::create('task_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('task_id');
            $table->index('task_id', 'task_tags_task_idx');
            $table->foreign('task_id', 'task_tags_task_fk')->on('tasks')->references('id')->cascadeOnDelete();

            $table->unsignedBigInteger('tag_id');
            $table->index('tag_id', 'task_tags_tag_idx');
            $table->foreign('tag_id', 'task_tags_tag_fk')->on('tags')->references('id')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_tags');
    }
};
