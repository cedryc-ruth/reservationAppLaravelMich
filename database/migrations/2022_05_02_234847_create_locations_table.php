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
            $table->string('slug', 255)->unique();
            $table->string('designation', 60);
            $table->string('address', 255);
            $table->string('website', 255);
            $table->string('phone', 30);
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
