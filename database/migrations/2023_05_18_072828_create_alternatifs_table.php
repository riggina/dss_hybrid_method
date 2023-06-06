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
        Schema::create('alternatifs', function (Blueprint $table) {
            $table->id();
            $table->string('alternatif_name');
            $table->text('alamat');
            $table->decimal('harga_rumah');
            $table->decimal('dp_rumah');
            $table->decimal('cicilan_rumah');
            $table->decimal('jarak_pinggir_kota');
            $table->decimal('jarak_pusat_kota');
            $table->decimal('jarak_jalan_raya');
            $table->decimal('jarak_pusat_perbelanjaan');
            $table->decimal('jarak_tempat_hiburan');
            $table->decimal('jarak_sekolah');
            $table->integer('sertifikat_rumah');
            $table->decimal('daya_listrik');
            $table->decimal('luas_bangunan');
            $table->decimal('luas_tanah');
            $table->integer('tipe_rumah');
            $table->integer('kamar_tidur');
            $table->integer('kamar_mandi');
            $table->decimal('lebar_jalan');
            $table->boolean('available_status');
            $table->string('img_url')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->double('latitude', 10, 8);
            $table->double('longitude', 11, 8);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatifs');
    }
};
