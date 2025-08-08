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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['traditional','wooden','colonial','contemporary','modern']);
            $table->integer('rooms')->default(0);
            $table->boolean('bathroom')->default(false);
            $table->boolean('living_room')->default(false);
            $table->boolean('kitchen')->default(false);
            $table->boolean('garden')->default(false);
            $table->boolean('garage')->default(false);
            $table->integer('floor_count')->default(0);
            $table->boolean('is_furnished')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
