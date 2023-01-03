<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_customers', function (Blueprint $table) {
            $table->id();
            $table->string('last_name',255)->nullable();
            $table->string('first_name',255)->nullable();
            $table->string('address',255)->nullable();
            $table->date('birth_day')->nullable();
            $table->string('identity_card',255)->nullable();
            $table->string('identity_after',255)->nullable();
            $table->string('identity_before',255)->nullable();
            $table->string('company_name',255)->nullable();
            $table->string('company_address',255)->nullable();
            $table->string('company_tax_code',255)->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone',14)->nullable();
            $table->string('zalo',14)->nullable();
            $table->string('fax',14)->nullable();
            $table->text('note',1000)->nullable();
            $table->smallInteger('status_id')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_customers');
    }
}
