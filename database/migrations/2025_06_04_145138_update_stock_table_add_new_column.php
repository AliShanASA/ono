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
    Schema::table('stock', function (Blueprint $table) {
      // Remove default from remaining_quantity
      $table->decimal('remaining_quantity', 10, 2)->nullable()->change();

      // Add new column after remaining_quantity
      $table->decimal('product_produced', 10, 2)->nullable()->after('remaining_quantity');
    });
  }

  public function down(): void
  {
    Schema::table('stock', function (Blueprint $table) {
      // Revert changes
      $table->decimal('remaining_quantity', 10, 2)->default(0)->change();
      $table->dropColumn('product_produced');
    });
  }
};
