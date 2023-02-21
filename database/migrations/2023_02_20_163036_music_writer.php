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
        Schema::create("music_writer", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("music_id")->nullable();
            $table->unsignedBigInteger("writer_id")->nullable();
            $table->foreign("music_id")->references("id")->on("music")->onDelete("cascade");
            $table->foreign("writer_id")->references("id")->on("writer")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
