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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            //who is posting
            $table->string('user_token', 50);
            $table->string('name', 200);
            $table->string('thumbnail', 150);
            $table->string('video', 150)->nullable();
            $table->text('description',)->nullable();
            $table->smallInteger('type_id');
            $table->float('price');
            $table->smallInteger('lesson_num')->nullable();
            $table->smallInteger('video_len')->nullable();
            $table->smallInteger('follow')->nullable();
            $table->float('score')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
