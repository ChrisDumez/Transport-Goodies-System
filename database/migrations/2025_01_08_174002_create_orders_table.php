<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orderupdates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customerid');
            $table->string('receiver');
            $table->string('address');
            $table->decimal('distance');
            $table->string('description');
            $table->string('weight');
            $table->date('date');
            $table->decimal('price');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
