<?php

use App\Models\languages;
use App\Models\party;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(languages::class)->constrained();
            $table->string('number');
            $table->date('date');
            $table->foreignIdFor(party::class)->constrained();
            $table->tinyInteger('status');
            $table->decimal('totalPrice');
            $table->integer('payPrice');
            $table->integer('remainPrice');
            $table->integer('deliveryTime');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
