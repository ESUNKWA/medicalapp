<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreationTablePrestations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_prestations', function (Blueprint $table) {
            $table->id();
            $table->string('r_code',10)->unique();
            $table->string('r_libelle',125)->unique();
            $table->double('r_prix');
            $table->boolean('r_status')->default(1);
            $table->longText('r_description')->nullable();
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
        Schema::dropIfExists('t_prestations');
    }
}
