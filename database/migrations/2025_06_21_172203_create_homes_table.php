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
    Schema::create('homes', function (Blueprint $table) {
        $table->id();
        $table->string('image');      // Path or filename of the painting image
        $table->string('pic')->nullable(); // Uploader's name or identifier (nullable if not always provided)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
