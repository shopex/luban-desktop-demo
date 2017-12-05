<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('名称');
            $table->string('order_srot')->comment('排序');
            $table->string('parent_id')->comment('父ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cat');
    }
}
