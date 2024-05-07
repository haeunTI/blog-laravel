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
        Schema::create('item_qn_a_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_agent')->nullable();
            $table->unsignedBigInteger('id_item')->nullable();
            $table->string('question_title')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('question')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_qn_a_s');
    }
};
