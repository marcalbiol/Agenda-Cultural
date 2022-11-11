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
        Schema::create('events', function (Blueprint $table) {
            $table->string('codi')->nullable();
            $table->string('data_fi')->nullable();
            $table->string('data_inici')->nullable();
            $table->string('denominaci')->nullable();
            $table->string('descripcio')->nullable();
            $table->string('entrades')->nullable();
            $table->string('horari')->nullable();
            $table->string('subt_tol')->nullable();
            $table->string('tags_mbits')->nullable();
            $table->string('tags_categor_es')->nullable();
            $table->string('enlla_os')->nullable();
            $table->string('imatges')->nullable();
            $table->string('v_deos')->nullable();
            $table->string('adre_a')->nullable();
            $table->string('comarca_i_municipi')->nullable();
            $table->string('email')->nullable();
            $table->string('espai')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('tel_fon')->nullable();
            $table->string('url')->nullable();
            $table->string('imgapp')->nullable();
            $table->string('descripcio_html')->nullable();
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
        Schema::dropIfExists('events');
    }
};
