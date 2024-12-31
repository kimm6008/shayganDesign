<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_trs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('languages_id');
            $table->foreignId('product_id');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_trs');
    }
};