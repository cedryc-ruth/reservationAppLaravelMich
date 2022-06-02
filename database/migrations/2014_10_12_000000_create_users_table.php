<?php

use App\Models\Language;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Les colonnes 'firstname','lastname','login' sont nullable parce que les seeders de l'outil d'administration Voyager TCG
         * vont générer une erreur dans la mesure où la table 'users' par default de laravel n'integre pas ces colonnes
         */
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',60)->nullable(); 
            $table->string('lastname',60)->nullable();
            $table->string('login',30)->nullable();
            $table->string('name'); 
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('language_id')->nullable()->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
