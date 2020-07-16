<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryImageItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_image_items', function (Blueprint $table) {
            $table->id();
            $table->string('blade_file');
            $table->unsignedBigInteger('gallery_settings_id');
            $table->timestamps();

            $table->foreign('gallery_settings_id')->references('id')->on('gallery_settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_image_items');
    }
}
