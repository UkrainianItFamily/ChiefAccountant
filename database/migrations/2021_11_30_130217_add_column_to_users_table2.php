<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('number_contract')->nullable()->after('company_code');
            $table->unsignedBigInteger('entrepreneurial_activity_id')->nullable()->after('number_contract');
            $table->foreign('entrepreneurial_activity_id')->references('id')->on('entrepreneurial_activity')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('number_contract');
            $table->dropColumn('entrepreneurial_activity_id');
        });
    }
}
