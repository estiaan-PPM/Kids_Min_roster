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
        Schema::table('children', function (Blueprint $table) {
            //$table->string('home_language')->nullable();
            $table->string('surname')->nullable()->after('name');
            $table->string('other')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('children', function (Blueprint $table) {
            //$table->dropColumn('home_language');
            $table->dropColumn('surname');
            $table->dropColumn('other');
        });
    }
};
