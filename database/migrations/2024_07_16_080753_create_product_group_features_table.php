<?php

use App\Models\feature;
use App\Models\product_group;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_group_features', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(product_group::class)->constrained();
            $table->foreignIdFor(feature::class)->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_group_features');
    }
};
