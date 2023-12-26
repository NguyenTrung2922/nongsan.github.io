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
        Schema::table('news', function (Blueprint $table) {
            $table->text('short-description')->change();

            // Thay đổi cấu trúc cột 'thumb'
            $table->string('thumb', 255)->nullable()->default(null)->change();

            // Thay đổi cấu trúc cột 'author'
            $table->string('author', 255)->nullable()->default(null)->change();
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
