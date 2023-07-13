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
            $table->bigInteger('contact');
            $table->string('img_url')->nullable();
            $table->boolean('available_status');
            $table->float('latitude', 10);
            $table->float('longitude', 10);
            $table->integer('tenor_tahun_cicilan');
            $table->bigInteger('C1');
            $table->bigInteger('C2');
            $table->bigInteger('C3');
            $table->bigInteger('C4');
            $table->float('C5', 8);
            $table->float('C6', 8);
            $table->float('C7', 8);
            $table->float('C8', 8);
            $table->float('C9', 8);
            $table->float('C10', 8);
            $table->float('C11', 8);
            $table->integer('C12');
            $table->integer('C13');
            $table->float('C14', 8);
            $table->float('C15', 8);
            $table->integer('C16');
            $table->integer('C17');
            $table->integer('C18');
            $table->float('C19', 8);
            $table->float('C20', 8);
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
