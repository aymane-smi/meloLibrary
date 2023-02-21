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
        Schema::create('category_music', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("music_id");
            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")->references("id")->on("category")->onDelete("cascade");
            $table->foreign("music_id")->references("id")->on("music")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music_categories');
    }
};
