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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->string('paiement_firstname');
            $table->string('paiement_lastname');
            $table->string('paiement_email');
            $table->string('paiement_phone')->nullable();
            $table->string('paiement_address')->nullable();
            $table->string('paiement_city')->nullable();
            $table->string('paiement_postalcode')->nullable();
            $table->string('discount')->nullable();
            $table->string('paiement_tax');
            $table->string('paiement_total');
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
        Schema::dropIfExists('orders');
    }
};
