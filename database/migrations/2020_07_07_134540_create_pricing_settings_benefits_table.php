<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreatePricingSettingsBenefitsTable
 */
class CreatePricingSettingsBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_settings_benefits', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->unsignedBigInteger('price_settings_id');
            $table->timestamps();

            $table->foreign('price_settings_id')->references('id')->on('price_settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pricing_settings_benefits');
    }
}
