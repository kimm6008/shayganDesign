<?php

use App\Models\city;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('fullname');
            $table->foreignIdFor(city::class)->constrained();
            $table->string('postalcode')->nullable();
            $table->string('mobile');
            $table->string('phone')->nullable();
            $table->string('address');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parties');
    }
};
