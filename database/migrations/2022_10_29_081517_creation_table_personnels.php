<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreationTablePersonnels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_personnels', function (Blueprint $table) {
            $table->id();
            $table->string('r_code', 10)->unique();
            $table->string('r_nom', 35);
            $table->string('r_prenoms', 35);
            $table->string('r_contact',15)->unique();
            $table->longText('r_description');
            $table->unsignedBigInteger('r_categorie');
            $table->unsignedBigInteger('r_specialite');
            $table->boolean('r_status')->default(true);
            $table->timestamps();

            $table->foreign('r_specialite')->on('t_specialites')->references('id');
            $table->foreign('r_categorie')->on('t_categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_personnels');
    }
}
