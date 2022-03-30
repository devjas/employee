<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_first_name', 20);
            $table->string('emp_last_name', 20);
            $table->string('emp_address_one', 155);
            $table->string('emp_address_two', 155)->nullable();
            $table->string('emp_city', 50);
            $table->string('emp_state', 4);
            $table->string('emp_zip', 16);
            $table->string('emp_email', 155)->nullable();
            $table->string('emp_phone', 20)->nullable();
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
        Schema::dropIfExists('employees');
    }
}
