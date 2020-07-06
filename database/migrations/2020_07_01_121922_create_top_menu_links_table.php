<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopMenuLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_menu_links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->unsignedBigInteger('top_menu_settings_id');
            $table->timestamps();

            $table->foreign('top_menu_settings_id')->references('id')->on('top_menu_settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_menu_links');
    }
}
