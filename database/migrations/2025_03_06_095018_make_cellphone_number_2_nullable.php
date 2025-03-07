<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('guardians', function (Blueprint $table) {
        $table->string('cellphone_number_2')->nullable()->change();
    });
}

public function down()
{
    Schema::table('guardians', function (Blueprint $table) {
        $table->string('cellphone_number_2')->nullable(false)->change();
    });
}

};
