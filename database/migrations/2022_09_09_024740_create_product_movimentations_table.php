<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_movimentations', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->foreignId('product_id')->constrained();
            $table->foreignId('place_from_id')->constrained('places');
            $table->foreignId('place_to_id')->constrained('places');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_movimentations');
    }
};
