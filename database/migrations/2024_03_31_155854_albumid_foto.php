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
        Schema::table('fotos', function (Blueprint $table) {
            $table->unsignedBigInteger('album_id')->nullable();
            $table->foreign('album_id')->references('id')->on('albums');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fotos', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['album_id']);

            // Drop the column
            $table->dropColumn('album_id');
        });
    }
};