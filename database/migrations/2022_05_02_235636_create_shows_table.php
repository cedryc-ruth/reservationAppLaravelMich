<?php

use App\Models\Location;
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
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->unique();
            $table->string('slug', 255)->unique();
            $table->string('subtitle')->nullable();
            $table->string('poster_url',255)->nullable();
            $table->text('images')->nullable();
            $table->tinyInteger('bookable')->default('1');
            $table->decimal('price', '10', '2', true)->nullable();
            $table->text('description');
            $table->foreignId('location_id')->nullable()->constrained()->restrictOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('shows');
    }
};
