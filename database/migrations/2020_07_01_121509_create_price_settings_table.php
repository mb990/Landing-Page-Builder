<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('yearly_price');
            $table->float('monthly_price');
            $table->float('discount_amount')->nullable();
            $table->unsignedBigInteger('pricing_section_id');
            $table->timestamps();

            $table->foreign('pricing_section_id')->references('id')->on('pricing_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_settings');
    }
}
