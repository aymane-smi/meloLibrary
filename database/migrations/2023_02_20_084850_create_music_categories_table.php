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
        Schema::create('music_category', function (Blueprint $table) {
            $table->integer("music_id")->unsigned();
            $table->integer("category_id")->unsigned();
            $table->foreign("music_id")->references("id")->on("music")->onDelete("cascade");
            $table->foreign("category_id")->references("id")->on("category")->onDelete("category");
            $table->primary(["music_id, category_id"]);
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
