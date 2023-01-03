<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_prices', function (Blueprint $table) {
            $table->id();
            $table->double('contract_price_1st', 12, 2)->default(0);
            $table->double('contract_price_2st', 12, 2)->default(0);
            $table->double('domain_price', 12, 2)->default(0);
            $table->double('domain_price_special', 12, 2)->default(0);
            $table->double('package_price', 12, 2)->default(0);
            $table->double('package_price_special', 12, 2)->default(0);
            $table->double('price_total', 12, 2)->default(0);
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
        Schema::dropIfExists('contract_prices');
    }
}
