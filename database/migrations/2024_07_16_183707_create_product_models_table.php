<?php

use App\Models\languages;
use App\Models\product_group;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_models', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId(product_group::class)->constrained();
            $table->boolean('enable')->default(true);
            $table->string('imgPath');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_models');
    }
};
