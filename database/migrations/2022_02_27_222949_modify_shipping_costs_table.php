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
        Schema::dropIfExists('shipping_cost_state');
        Schema::table('shipping_costs', function (Blueprint $table) {
            $table->dropColumn(['amount']);
            $table->string('group_name');
            $table->float('pickup_amount', 8, 0);
            $table->float('delivery_amount', 8, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipping_costs', function (Blueprint $table) {
            $table->float('amount', 8, 0);
            if (Schema::hasColumn('shipping_costs', 'group_name')) {
                $table->dropColumn('group_name');
            }
            if (Schema::hasColumn('shipping_costs', 'pickup_amount')) {
                $table->dropColumn('pickup_amount');
            }
            if (Schema::hasColumn('shipping_costs', 'delivery_amount')) {
                $table->dropColumn('delivery_amount');
            }
        });
    }
};
