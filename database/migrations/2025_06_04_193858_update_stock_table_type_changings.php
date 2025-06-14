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
       Schema::table('stock', function(BluePrint $table){
        $table->integer('inital_quantity')->change();
        $table->integer('product_produced')->change();
        $table->integer('remaining_quantity')->change();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
