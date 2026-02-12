<?php

use App\Models\languages;
use App\Models\product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_trs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId(languages::class)->constrained();
            $table->foreignId(product::class)->constrained();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_trs');
    }
};
