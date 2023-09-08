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
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->date('planting_date');
            $table->string('crop_type');
            $table->date('harvesting_date'); 
            $table->text('description')->nullable(); 
            $table->string('location')->nullable(); 
            $table->string('status')->nullable(); 
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crops');
    }
};
