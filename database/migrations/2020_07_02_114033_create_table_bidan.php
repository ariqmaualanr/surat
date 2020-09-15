<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBidan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_bidan',20);
            $table->timestamps();
        });

        //set FK di kolom id_kelas ditabel pengajar
        Schema::table('anak',function(Blueprint $table) {
            $table->foreign('id_bidan')
                  ->references('id')
                  ->on('bidan')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anak',function(Blueprint $table){
            $table->dropForeign('anak_id_bidan_foreign');
        });
        Schema::dropIfExists('bidan');
    }
}
