<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cate_id');
            $table->string('nom');
            $table->mediumText('marque');
            $table->longText('déscription');
            $table->string('prix_original');
            $table->string('prix_remise');
            $table->string('quantite');
            $table->string('taxe');
            $table->tinyInteger('statut')->default('0');
            $table->tinyInteger('tendance')->default('0');
            $table->mediumText('meta_titre');
            $table->mediumText('meta_mot_cle');
            $table->string('image');
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
        Schema::dropIfExists('produits');
    }
}
