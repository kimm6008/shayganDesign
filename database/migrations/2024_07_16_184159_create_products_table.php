<?php

use App\Models\languages;
use App\Models\product_group;
use App\Models\product_model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(product_group::class)->constrained();
            $table->foreignIdFor(product_model::class)->constrained();
            $table->boolean('enable')->default(true);
            $table->boolean('is_selective')->default(false);
            $table->string('color_code',100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
