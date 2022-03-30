<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_titles', function (Blueprint $table) {
            $table->foreignId('emp_id')->constrained('employees')->onDelete('cascade');
            $table->string('emp_title', 50);
            $table->string('emp_start_date', 20);
            $table->string('emp_end_date', 30)->nullable();
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
        Schema::dropIfExists('employee_titles');
    }
}
