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
    Schema::create('production', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('stock_id')->nullable();
      $table->unsignedBigInteger('loom_id')->nullable();
      $table->unsignedBigInteger('unit_id')->nullable();
      $table->decimal('product', 8, 1)->nullable();
      $table->string('quality')->nullable();
      $table->date('date')->nullable();
      $table->timestamps();

      $table->foreign('stock_id')->references('id')->on('stock')->onDelete('cascade');
      $table->foreign('loom_id')->references('id')->on('loom')->onDelete('cascade');
      $table->foreign('unit_id')->references('id')->on('unit')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('production');
  }
};
