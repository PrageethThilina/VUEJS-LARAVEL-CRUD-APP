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
            $table->increments('emp_id');
            $table->timestamps();
            $table->text('emp_fname');
            $table->text('emp_lname');
            $table->text('emp_dob');
            $table->text('emp_section');
            $table->text('emp_email');
            $table->text('emp_phone');
            $table->text('emp_address');
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
