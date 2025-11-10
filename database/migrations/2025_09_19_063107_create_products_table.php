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
        Schema::create('products', function (Blueprint $table) {
            $table->id();                      // id
            $table->string('name');            // name
            $table->string('image')->nullable(); // image path
            $table->decimal('mrp', 10, 2)->nullable();
            $table->decimal('sellprice', 10, 2)->nullable();
            $table->decimal('rating', 3, 2)->default(0.00); // e.g. 4.50
            $table->string('size')->nullable(); // size e.g. "S,M,L" or single value
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->date('date')->nullable();  // date field (if you want created/available date)
            $table->timestamps();              // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
