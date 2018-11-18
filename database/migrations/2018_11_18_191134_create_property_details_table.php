<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area_square_meters');
            $table->string('type');
            $table->string('window_type');
            $table->string('direction');
            $table->boolean('balcony');
            $table->boolean('cellar');
            $table->boolean('garage');
            $table->boolean('insulated');
            $table->string('heating');
            $table->string('internet');
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
        Schema::dropIfExists('property_details');
    }
}
