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
        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id');
            $table->string('number_ticket');
            $table->string('title');
            $table->string('subject');
            $table->string('from');
            $table->string('description');
            $table->date('ticket_open');
            $table->date('ticket_close');
            $table->string('product_id');
            $table->string('user_id');
            $table->string('customer_id');
            $table->string('license_id');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};
