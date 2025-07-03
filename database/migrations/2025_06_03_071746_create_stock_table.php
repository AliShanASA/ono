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
    Schema::create('stock', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('loom_id')->nullable();
      $table->unsignedBigInteger('unit_id')->nullable();
      $table->decimal('inital_quantity', 8, 1)->nullable();
      $table->decimal('remaining_quantity', 8, 1)->default(0)->nullable();
      $table->decimal('product_produced', 8, 1)->nullable();
      $table->decimal('width', 8, 1)->nullable();
      $table->string('quality')->nullable();
      $table->string('worker_name')->nullable();
      $table->date('date')->nullable();
      $table->time('time')->nullable();
      $table->timestamps();

      $table->foreign('loom_id')->references('id')->on('loom')->onDelete('cascade');
      $table->foreign('unit_id')->references('id')->on('unit')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('stock');
  }
};
