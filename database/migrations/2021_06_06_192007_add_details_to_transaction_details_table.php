<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->integer('transaction_id');
            $table->string('username');
            $table->string('nationality');
            $table->boolean('is_visa');
            $table->date('doe_passport');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->dropColumn('transaction_id');
            $table->dropColumn('username');
            $table->dropColumn('nationality');
            $table->dropColumn('is_visa');
            $table->dropColumn('doe_passport');
        });
    }
}
