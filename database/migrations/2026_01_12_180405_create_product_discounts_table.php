<?php

use App\Models\currency;
use App\Models\product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_discounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId(product::class)->constrained();
            $table->foreignId(currency::class)->constrained();
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->decimal('discount_percent')->nullable();
            $table->integer('discount_value')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_discounts');
    }
};
