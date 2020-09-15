<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAnak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anak', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kms', 10)->unique();
            $table->string('nama_anak', 30);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['L', 'P']);
            $table->string('nama_ibu', 30);
            $table->bigInteger('id_bidan')->unsigned();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('anak');
    }
}
