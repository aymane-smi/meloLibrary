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
        //
        Schema::create("artist_band", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("artist_id");
            $table->unsignedBigInteger("band_id");
            $table->foreign("artist_id")->references("id")->on("artist")->onDelete("cascade");
            $table->foreign("band_id")->references("id")->on("band")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists("artist_band");
    }
};
