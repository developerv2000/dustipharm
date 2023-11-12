<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugstores', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('phone');
            $table->string('email');
            $table->string('working_days');
            $table->string('working_hours');
            $table->string('x_coordinates');
            $table->string('y_coordinates');
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
        Schema::dropIfExists('drugstores');
    }
};
