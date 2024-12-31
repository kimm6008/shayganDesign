<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_feature_value_trs', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->foreignId('languages_id');
            $table->foreignId('feature_values_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_feature_value_trs');
    }
};
