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
        Schema::create('dailyreports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('pos');
            $table->string('unit');
            $table->string('cat');
            $table->string('subj');
            $table->string('desc');
            $table->string('sub')->nullable();
            $table->string('moder')->default(0);
            $table->string('date');
            $table->string('ym');
            $table->string('y');
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
        Schema::dropIfExists('dailyreports');
    }
};
