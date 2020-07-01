<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_elements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('page_element_type_id');
            $table->unsignedBigInteger('page_elementable_id');
            $table->string('page_elementable_type');
            $table->timestamps();

            $table->foreign('page_element_type_id')->references('id')->on('page_elements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_elements');
    }
}
