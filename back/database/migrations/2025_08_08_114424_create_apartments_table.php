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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->enum('category',['apartment','office','store']);
            $table->integer('floor_number')->default(0);
            $table->string('building_name')->nullable();
            $table->integer('rooms')->default(0);
            $table->boolean('bathroom')->default(false);
            $table->boolean('kitchen')->default(false);
            $table->boolean('balcony')->default(false);
            $table->boolean('parking')->default(false);
            $table->boolean('is_furnished')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
