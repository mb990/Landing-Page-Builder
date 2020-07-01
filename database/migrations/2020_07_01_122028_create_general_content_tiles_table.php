<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralContentTilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_content_tiles', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->unsignedBigInteger('general_content_settings_id');
            $table->timestamps();

            $table->foreign('general_content_settings_id', 'gcs_id')->references('id')->on('general_content_settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_content_tiles');
    }
}
