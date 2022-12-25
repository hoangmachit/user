<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeinkeyContractHosting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contract_hostings', function (Blueprint $table) {
            $table->foreignId('contract_id')->constrained('contracts');
            $table->foreignId('package_id')->constrained('packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contract_hostings', function (Blueprint $table) {
            $table->dropForeign(['contract_id']);
            $table->dropForeign(['package_id']);
        });
    }
}
