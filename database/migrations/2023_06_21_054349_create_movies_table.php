<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id')->nullable(false);
            $table->string('title', 100)->nullable(false);
            $table->text('description')->nullable(false);
            $table->date('release_date')->nullable(false);
            $table->string('poster_url', 255)->nullable(false);
            $table->string('age_rating', 10)->nullable(false);
            $table->integer('ticket_price')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
