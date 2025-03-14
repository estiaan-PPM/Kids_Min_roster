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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            // $table->unsignedBigInteger('parent_id');
            $table->foreignIdFor(\App\Models\Guardians::class);
            $table->integer('age');
            $table->string('allergies');
            $table->string('age_group');
            $table->date('birth_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};
