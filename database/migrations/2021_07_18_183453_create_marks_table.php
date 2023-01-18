<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->integer('visitor_id');
            $table->text('terminal');
            $table->integer('blog1_id');
            $table->integer('marks1');
            $table->integer('blog2_id')->nullable();
            $table->integer('marks2')->nullable();
            $table->integer('blog3_id')->nullable();
            $table->integer('marks3')->nullable();
            $table->integer('blog4_id')->nullable();
            $table->integer('marks4')->nullable();
            $table->integer('blog5_id')->nullable();
            $table->integer('marks5')->nullable();
            $table->text('remarks');
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
        Schema::dropIfExists('marks');
    }
}
