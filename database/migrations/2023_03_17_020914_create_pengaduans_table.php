<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->biginteger('category_id');
            $table->biginteger('village_id');
            $table->char('nik');
            $table->date('date');
            $table->string('judul');
            $table->string('foto');
            $table->text('isi');
            $table->enum('status',['0','proses','selesai'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
};
