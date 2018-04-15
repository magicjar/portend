<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->string('media_type', 10)->default('image');
            $table->string('thumbnail')->nullable();
            $table->string('title')->nullable();
            $table->string('caption')->nullable();
            $table->string('alt')->nullable();
            $table->string('description')->nullable();
            $table->string('resolution', 13)->nullable();
            $table->smallinteger('filesize')->nullable();
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
        Schema::dropIfExists('images');
    }
}
