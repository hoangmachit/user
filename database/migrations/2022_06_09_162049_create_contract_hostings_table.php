<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractHostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_hostings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->integer('gb')->default(0);
            $table->integer('ram')->default(0);
            $table->double('price', 12, 2)->default(0);
            $table->double('price_special', 12, 2)->default(0);
            $table->smallInteger('status_id')->default(1);
            $table->text('package_infomations')->nullable();
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
        Schema::dropIfExists('contract_hostings');
    }
}
