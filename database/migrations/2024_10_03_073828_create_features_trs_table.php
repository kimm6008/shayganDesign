<?php

use App\Models\feature;
use App\Models\languages;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('features_trs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId(languages::class)->constrained();
            $table->foreignId(feature::class)->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('features_trs');
    }
};
