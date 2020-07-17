<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralContentThreeTilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_content_three_tiles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text');
            $table->string('blade_file');
            $table->unsignedBigInteger('general_content_three_settings_id');
            $table->timestamps();

            $table->foreign('general_content_three_settings_id', 'tiles_section_id')->references('id')->on('general_content_three_settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_content_three_tiles');
    }
}
