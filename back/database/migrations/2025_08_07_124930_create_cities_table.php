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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('region', [
                'Analamanga', 'Bongolava', 'Itasy', 'Vakinankaratra',
                'Diana', 'Sava', 'Amoroni Mania', 'Atsimo-Atsinanana',
                'Fitovinany', 'Haute Matsiatra', 'Ihorombe', 'Vatovavy',
                'Betsiboka', 'Boeny', 'Melaky', 'Sofia', 'Alaotra-Mangoro',
                'Ambatosoa', 'Analanjirofo', 'Atsinanana', 'Androy',
                'Anosy', 'Atsimo-Andrefana', 'Menabe'
            ]);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
