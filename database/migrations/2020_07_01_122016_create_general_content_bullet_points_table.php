<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralContentBulletPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_content_bullet_points', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->unsignedBigInteger('general_content_settings_id');
            $table->timestamps();

            $table->foreign('general_content_settings_id', 'gcs2_id')->references('id')->on('general_content_settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_content_bullet_points');
    }
}
