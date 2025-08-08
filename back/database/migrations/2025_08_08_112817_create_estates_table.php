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
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('category', ['sale', 'location']);
            $table->morphs('type');
            $table->decimal('sell_price', 10, 2)->nullable();
            $table->decimal('rent_price', 10, 2)->nullable();
            $table->decimal('area', 10, 2);
            $table->double('longitude');
            $table->double('latitude');
            $table->string('address');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->foreignId('promoter_id')->constrained()->onDelete('cascade');
            $table->foreignId('agency_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('visitor_id')->nullable()->constrained()->onDelete('cascade');
            $table->boolean('is_validated')->default(false);
            $table->enum('status',['available','reserved','sold','rent','removed'])->default('available');
            $table->string('cover_image')->nullable();
            $table->boolean('water')->default(true);
            $table->boolean('eletricity')->default(true);
            $table->integer('views_count')->default(0);
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estates');
    }
};
