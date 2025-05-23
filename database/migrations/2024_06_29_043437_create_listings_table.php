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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('tags');
            $table->string('location');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations. issue
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
