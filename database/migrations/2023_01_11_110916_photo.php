<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo', function (Blueprint $table) {
            $table->id();
            $table->string('photoName');
            $table->unsignedBigInteger('idAuthor');
            $table->foreign('idAuthor')->references('id')->on('users')->onDelete('cascade');
            $table->string('prompt');
            $table->string('website');
            $table->string('height');
            $table->string('width');
            $table->string('imageStoreName');
            $table->unsignedBigInteger('idAlbum');
            $table->foreign('idAlbum')->references('id')->on('album')->onDelete('cascade');
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
        Schema::dropIfExists('photo');
    }
};
