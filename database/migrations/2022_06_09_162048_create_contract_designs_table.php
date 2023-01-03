<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_designs', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->text('url', 1000)->nullable();
            $table->text('note', 1000)->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_finish')->nullable();
            $table->text('font_family', 255)->nullable();
            $table->text('url_example', 1000)->nullable();
            $table->string('photo', 255)->nullable();
            $table->smallInteger('status_id')->default(1);
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
        Schema::dropIfExists('contract_designs');
    }
}
