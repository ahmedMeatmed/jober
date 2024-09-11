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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->text('responses');
            $table->text('requires');
            $table->text('qualifications');
            $table->integer('salary');
            $table->text('benefits');
            $table->text('location');
            $table->string('work_type');
            $table->date('deadline');
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('admin_id');
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('employers');
            $table->foreign('admin_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
