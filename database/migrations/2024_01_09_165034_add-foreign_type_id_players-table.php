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
        Schema::table('types', function (Blueprint $table) {
            // aggiungiamo campo category_id
            $table->unsignedBigInteger('type_id')->nullable()->after('id');
            // aggiugniamo il vincolo della realzione
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('types', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            
            $table->dropColumn('type_id');
        });
    }
};
