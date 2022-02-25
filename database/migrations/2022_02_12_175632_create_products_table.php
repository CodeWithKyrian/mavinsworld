<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('sku');
            $table->foreignId('category_id')->constrained();
            $table->float('cost_price', 10);
            $table->float('selling_price', 10);
            $table->integer('current_stock')->default(0);
            $table->integer('total_stock')->default(0);
            $table->string('unit')->default('pcs');
            $table->json('tags');
            $table->float('rating', 4)->nullable();
            $table->boolean('is_published')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
