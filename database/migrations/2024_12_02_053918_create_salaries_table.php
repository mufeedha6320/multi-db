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
        // add connection name in schema, model file
        Schema::connection('mysql2')->create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->decimal('salary',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql2')->dropIfExists('salaries');
    }
};
