<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('books', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->string('info_link')->nullable(); // ✅ Adds the missing column
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->dropColumn('info_link');
        });
    }
};
