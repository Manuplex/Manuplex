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
        Schema::create('bacheliers', function (Blueprint $table) {
            $table->string('matricule')->primary();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->integer('num_commercial');
            $table->date('save_date');
            $table->string('code_link')->unique();
            $table->string('telephone');
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
        Schema::dropIfExists('bacheliers');
    }
};
