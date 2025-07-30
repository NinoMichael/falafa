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
        Schema::create('information_details', function (Blueprint $table) {
            $table->id();
            $table->morphs('profilable');
            $table->string('lastname');
            $table->string('firstname');
            $table->date('birth_date');
            $table->boolean('is_male');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information_details');
    }
};
