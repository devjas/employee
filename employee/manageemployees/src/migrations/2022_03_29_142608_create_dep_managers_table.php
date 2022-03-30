<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dep_managers', function (Blueprint $table) {
            $table->foreignId('emp_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('dep_id')->constrained('departments')->onDelete('cascade');
            $table->string('emp_start_date', 20);
            $table->string('emp_end_date', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dep_managers');
    }
}
