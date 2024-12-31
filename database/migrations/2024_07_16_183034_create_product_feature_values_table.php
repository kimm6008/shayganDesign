<?php

use App\Models\feature;
use App\Models\languages;
use App\Models\product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_feature_values', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(feature::class)->constrained();
            $table->foreignIdFor(product::class)->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_feature_values');
    }
};
