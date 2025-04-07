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
        Schema::create('ms_menus', function (Blueprint $table) {
            $table->string('menuid', 5)->primary();
            $table->string('menuname', 50);
            $table->integer('menuprice');
            $table->string('menuimage');
            $table->string('menucategoryid', 6);
            $table->foreign('menucategoryid')->references('menucategoryid')->on('ms_menu_categories')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_menus');
    }
};
