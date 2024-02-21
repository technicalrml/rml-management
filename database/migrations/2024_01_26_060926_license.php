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
        Schema::create('license', function (Blueprint $table) {
            $table->id();
            $table->string('license_id');
            $table->string('customer_id');
            $table->string('product_id');
            $table->string('varieties_of_products');
            $table->string('pic');
            $table->date('start_date');
            $table->string('expired_date');
            $table->string('type_of_support');
            $table->string('description');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license');
    }
};
