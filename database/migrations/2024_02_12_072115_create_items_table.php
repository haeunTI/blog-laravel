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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('id_property_type');
            $table->string('id_amenity');
            $table->string('nama_property');
            $table->string('slug_property');
            $table->string('kode_property')->unique();
            $table->string('harga_property');
            $table->string('ukuran_property');
            $table->string('status_property');
            $table->string('harga_mahal')->nullable();
            $table->string('harga_murah')->nullable();
            $table->string('pict_property')->nullable();
            $table->text('info_pendek')->nullable();
            $table->text('info_panjang')->nullable();
            $table->string('amenities')->nullable();
            $table->string('ruang');
            $table->string('kamar_mandi');
            $table->string('gudang');
            $table->string('ukuran_gudang');
            $table->date('tanggal_konstruksi')->nullable();
            $table->string('video_property')->nullable();
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('kode_pos')->nullable();
            $table->string('featured')->nullable();
            $table->string('hot')->nullable();
            $table->string('id_agent')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
