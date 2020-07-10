<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonial_settings', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->string('customer_name');
            $table->string('blade_file');
            $table->unsignedBigInteger('testimonial_section_id');
            $table->timestamps();

            $table->foreign('testimonial_section_id')->references('id')->on('testimonial_sections')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonial_settings');
    }
}
