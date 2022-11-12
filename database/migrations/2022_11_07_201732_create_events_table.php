<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codi')->nullable();
            $table->text('data_fi')->nullable();
            $table->text('data_inici')->nullable();
            $table->text('denominaci')->nullable();
            $table->text('descripcio')->nullable();
            $table->text('entrades')->nullable();
            $table->text('horari')->nullable();
            $table->text('subt_tol')->nullable();
            $table->text('tags_mbits')->nullable();
            $table->text('tags_categor_es')->nullable();
            $table->text('enlla_os')->nullable();
            $table->text('imatges')->nullable();
            $table->text('adre_a')->nullable();
            $table->text('comarca_i_municipi')->nullable();
            $table->text('email')->nullable();
            $table->text('espai')->nullable();
            $table->text('tel_fon')->nullable();
            $table->text('url')->nullable();
            $table->text('descripcio_html')->nullable();
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
