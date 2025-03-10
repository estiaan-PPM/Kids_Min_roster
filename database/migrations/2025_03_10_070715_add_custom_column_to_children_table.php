<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('children', function (Blueprint $table) {
            $table->string('test_2025_03_10')->nullable(); // Hardcoded column name
        });
    }

    public function down()
    {
        Schema::table('children', function (Blueprint $table) {
            $table->dropColumn('test_2025_03_10'); // Use the same column name
        });
    }
};