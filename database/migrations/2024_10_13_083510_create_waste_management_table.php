<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('waste_management', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id'); // Foreign Key 
            $table->enum('waste_type', ['plastic', 'paper', 'metal', 'glass', 'organic']); 
            $table->float('quantity');
            $table->enum('status', ['pending', 'completed'])->default('pending'); // Status 
            $table->timestamps(); 
        });

        Schema::table('waste_management', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_management');
    }
};
