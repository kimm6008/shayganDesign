<?php

use App\Models\currency;
use App\Models\invoice;
use App\Models\product;
use App\Models\product_price;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(invoice::class)->constrained();
            $table->foreignIdFor(product::class)->constrained();
            $table->integer('quantity');
            $table->integer('fee');
            $table->foreignIdFor(product_price::class)->constrained();
            $table->foreignIdFor(currency::class)->constrained();
            $table->integer('totalPrice');
            $table->integer('deliveryTime');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
