<?php

use App\Models\invoice;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('invoice_payment_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(invoice::class)->constrained();
            $table->integer('price');
            $table->string('trackingNumber');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_payment_histories');
    }
};
