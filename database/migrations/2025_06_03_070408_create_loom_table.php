<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('loom', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('unit_id')->nullable();
      $table->timestamps();
      $table->foreign('unit_id')->references('id')->on('unit')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('loom');
  }
};
