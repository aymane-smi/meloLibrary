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
        Schema::create('artist_music', function (Blueprint $table) {
            $table->unsignedBigInteger("music_id");
            $table->unsignedBigInteger("artist_id");
            $table->foreign("music_id")->references("id")->on("music")->onDelete("cascade");
            $table->foreign("artist_id")->references("id")->on("artist")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artist_music');
    }
};
