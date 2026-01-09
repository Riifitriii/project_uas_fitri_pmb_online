<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('calon_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('angkatan');
            $table->unsignedBigInteger('prodi_id')->nullable();
            $table->string('foto')->nullable();
            $table->string('status')->default('menunggu'); // menunggu/diterima/ditolak
            $table->timestamps();

            $table->foreign('prodi_id')->references('id')->on('prodi')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('calon_mahasiswa');
    }
};