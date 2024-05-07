<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_webs', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('nomor');
            $table->string('alamat');
            $table->string('email');
            $table->string('fb');
            $table->string('ig');
            $table->string('twt');
            $table->string('copyright');
     
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_webs');
    }
};
