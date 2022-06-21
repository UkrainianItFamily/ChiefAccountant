<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('login')->nullable()->unique();
            $table->string('password');
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_entity')->default(0);
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('company_address')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('company_code')->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
