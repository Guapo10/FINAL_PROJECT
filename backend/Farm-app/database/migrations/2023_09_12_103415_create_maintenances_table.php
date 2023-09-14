<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_id')->constrained(); // Assuming you have an 'equipment_id' foreign key
            $table->date('maintenance_date');
            $table->string('description')->nullable();
            $table->decimal('cost', 10, 2)->nullable(); // Adjust the precision and scale as needed
            $table->timestamps();
            $table->softDeletes(); // Corrected method name to 'softDeletes'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenances');
    }
}
