<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddRenderOrderToPageElementsTable
 */
class AddRenderOrderToPageElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_elements', function (Blueprint $table) {
            $table->integer('render_order')->nullable()->after('blade_file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_elements', function (Blueprint $table) {
            //
        });
    }
}
