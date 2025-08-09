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
        Schema::create('hasil_temuan', function (Blueprint $table) {
            $table->id('id_hasil_temuan');
            $table->bigInteger('id_sub_kriteria')->unsigned();
            $table->string('hasil_temuan');
            $table->enum('status_tahun_lalu', ['Belum ada standar ini pada tahun lalu', 'Temuan dan belum ditindaklanjuti', 'Temuan dan sudah ditindaklanjuti sebagian', 'Selesai'])->default(null);
            $table->enum('status_tahun_ini', ['Belum ada standar ini pada tahun lalu', 'Temuan dan belum ditindaklanjuti', 'Temuan dan sudah ditindaklanjuti sebagian', 'Selesai'])->default(null);
            $table->string('kendala')->nullable()->default(null);
            $table->string('tindak_lanjut')->nullable()->default(null);
            $table->string('masukkan')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('id_sub_kriteria')->references('id_sub_kriteria')->on('sub_kriteria')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_temuan');
    }
};
