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
        Schema::create('alternatives', function (Blueprint $table) {
            $table->id();
            $table->string('alternative_name');
            $table->string('slug');
            $table->text('alamat');
            $table->string('img_url')->nullable();
            $table->boolean('available_status');
            $table->float('latitude');
            $table->float('longitude');
            $table->float('harga_rumah');
            $table->float('dp_rumah');
            $table->integer('cicilan_rumah');
            $table->float('jarak_pinggir_kota');
            $table->float('jarak_pusat_kota');
            $table->float('jarak_jalan_raya');
            $table->float('jarak_pusat_perbelanjaan');
            $table->float('jarak_tempat_hiburan');
            $table->float('jarak_sekolah');
            $table->integer('sertifikat_rumah');
            $table->float('daya_listrik');
            $table->float('luas_bangunan');
            $table->float('luas_tanah');
            $table->integer('tipe_rumah');
            $table->integer('kamar_tidur');
            $table->integer('kamar_mandi');
            $table->float('lebar_jalan');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatives');
    }
};
