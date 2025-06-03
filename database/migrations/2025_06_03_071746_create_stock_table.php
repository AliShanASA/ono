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
      $table->unsignedBigInteger('loom_id');
      $table->unsignedBigInteger('unit_id');
      $table->decimal('inital_quantity');
      $table->decimal('remaining_quantity')->default(0);
      $table->decimal('width');
      $table->string('quality');
      $table->string('worker_name');
      $table->date('date');
      $table->time('time');
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
