<?php

use App\Models\Locality;
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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('designation', 60);
            $table->string('slug', 255)->unique();
            $table->string('address', 255);
            $table->string('website', 255)->nullable();
            $table->string('phone', 30)->nullable();
            $table->text('story')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('locality_id')->nullable()->constrained()->restrictOnDelete()->cascadeOnUpdate();

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
