<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('album', function (Blueprint $table) {
            $table->id();
            $table->string('albumName')->unique();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('album');
    }
};
