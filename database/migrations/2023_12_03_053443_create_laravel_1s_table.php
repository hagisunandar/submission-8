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
        Schema::create('laravel_1', function (Blueprint $table) {
            $table->string('nama');
            $table->string('alamat');
            $table->integer('nomor_kontak');
            $table->unique('nomor_kontak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laravel_1');
    }
};
