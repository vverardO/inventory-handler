<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_entries', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_entries');
    }
};
