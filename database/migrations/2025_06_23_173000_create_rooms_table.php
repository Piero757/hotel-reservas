<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('rooms', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description');
        $table->double('price');
        $table->integer('capacity');
        $table->string('image')->nullable();
        $table->boolean('available')->default(true);
        $table->timestamps();
    });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
