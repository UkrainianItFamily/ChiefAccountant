<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('app_id')->constrained('apps', 'id')->onDelete('cascade');
            $table->foreignId('report_id')->constrained('reports', 'id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_report');
    }
}
