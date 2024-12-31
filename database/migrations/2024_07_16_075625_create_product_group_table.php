<?php

use App\Models\languages;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_groups', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->boolean('enable')->default(true);
            $table->string("imgPath");
            $table->integer('DeliveryDuration');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_group');
    }
};
