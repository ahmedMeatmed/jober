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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('employer_email');
            $table->text('password');
            $table->text('industry');
            $table->text('postalcode');
            $table->text('taxcard');
            $table->text('commercial_register');
            $table->text('img_path');
            $table->text('country');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
