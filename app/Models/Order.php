<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customerid',
        'receiver',
        'address',
        'distance',
        'description',
        'weight',
        'date',
        'price',
        'status',
    ];
}

/*
Schema::create('orders', function (Blueprint $table) {
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
*/
