<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_group_trs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('languages_id');
            $table->foreignId(\App\Models\product_group::class)->constrained();;
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_group_trs');
    }
};
