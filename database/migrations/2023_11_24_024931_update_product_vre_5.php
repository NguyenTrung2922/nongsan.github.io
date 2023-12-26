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
        Schema::table('products', function (Blueprint $table) {

            // Thay đổi cấu trúc cột 'thumb'
            $table->text('SKU')->nullable()->default(null)->change();
            $table->integer('price')->nullable()->default(null)->change();
            // Thay đổi cấu trúc cột 'author'
            $table->longText('content')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
