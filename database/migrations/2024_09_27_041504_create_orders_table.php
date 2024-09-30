<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('tax_rate', 10, 2);
            $table->decimal('shopping_fee', 10, 2);
            $table->unsignedBigInteger('shipping_to');
            $table->decimal('total', 10, 2);
            $table->text('shipping_address')->nullable();
            $table->text('extra_shipping_info')->nullable();
            $table->char('profile', 36);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
