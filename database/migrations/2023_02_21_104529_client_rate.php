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
        Schema::create("client_rate", function (Blueprint $table) {
            $table->id();
            $table->integer("rating");
            $table->unsignedBigInteger("client_id");
            $table->unsignedBigInteger("music_id");
            $table->foreign("client_id")->references("id")->on("client")->onDelete("cascade");
            $table->foreign("music_id")->references("id")->on("music")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists("client_rate");
    }
};
