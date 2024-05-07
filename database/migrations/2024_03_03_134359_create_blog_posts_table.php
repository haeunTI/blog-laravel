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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('blog_cat_id');
            $table->integer('id_user')->nullable();
            $table->string('judul')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->text('info_panjang')->nullable();
            $table->text('info_pendek')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
