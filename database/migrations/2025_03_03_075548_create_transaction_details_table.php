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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->string('transactionid', 6);
            $table->string('menuid', 5);
            $table->integer('quantity');

            $table->primary(['transactionid', 'menuid']);
            $table->foreign('transactionid')->references('transactionid')->on('transaction_headers')->onDelete('cascade');
            $table->foreign('menuid')->references('menuid')->on('ms_menus')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
