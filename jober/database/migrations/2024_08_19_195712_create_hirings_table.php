<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */


     public function up(): void
{
    Schema::create('hirings', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('post_id');
        $table->unsignedBigInteger('candidate_id');
        // $table->primary(['post_id', 'candidate_id']);
        $table->timestamps();

        // Define foreign key constraints
        $table->foreign('post_id')->references('id')->on('posts');
        $table->foreign('candidate_id')->references('id')->on('candidates');
    });
}
    // public function up(): void
    // {
    //     Schema::create('hirings', function (Blueprint $table) {
    //         $table->id();
    //         $table->unsignedBigInteger('post_id');
    //         $table->unsignedBigInteger('candidate_id');
    //         // $table->primary(['post_id','candidate_id']);
    //         $table->timestamps();

    //         // $table->foreign('post_id')->Reference('id')->on('posts');
    //         $table->foreign('candidate_id')->Reference('id')->on('admins');
    //         $table->foreign('post_id')->references('id')->on('posts');
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hirings');
    }
};
