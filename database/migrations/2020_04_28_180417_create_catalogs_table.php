<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            //image id refer to the featured image from catalog images
            $table->unsignedBigInteger('image_id')->nullable();
            $table->mediumText('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('start_at');
            $table->string('end_at')->nullable();
            $table->unsignedInteger('total_views')->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('store_id')
                ->references('id')
                ->on('stores')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogs');
    }
}
