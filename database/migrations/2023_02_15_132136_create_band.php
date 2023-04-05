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
        Schema::create('band', function (Blueprint $table) {
            $table->id();
            $table->string("image");
            $table->string("name");
            $table->string("country");
            $table->integer("selected")->default(0);
            $table->date("creation_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('band');
    }
};
