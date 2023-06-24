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
            $table->foreignId('user_id')->constrained();;
            $table->string('alternative_name');
            $table->string('slug');
            $table->text('alamat');
            $table->integer('contact');
            $table->string('img_url')->nullable();
            $table->boolean('available_status');
            $table->float('latitude');
            $table->float('longitude');
            $table->integer('tenor_tahun_cicilan');
            $table->integer('C1');
            $table->integer('C2');
            $table->integer('C3');
            $table->integer('C4');
            $table->float('C5');
            $table->float('C6');
            $table->float('C7');
            $table->float('C8');
            $table->float('C9');
            $table->float('C10');
            $table->float('C11');
            $table->integer('C12');
            $table->integer('C13');
            $table->float('C14');
            $table->float('C15');
            $table->integer('C16');
            $table->integer('C17');
            $table->integer('C18');
            $table->float('C19');
            $table->float('C20');
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
