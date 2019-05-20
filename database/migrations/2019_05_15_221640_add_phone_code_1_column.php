<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneCode1Column extends Migration
{
    /**
     * Run the migrations.
     * Запускается при вызове php artisan migrate
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->char('phone_code_1', 5)->after('email');
        });
    }

    /**
     * Reverse the migrations.
     * Запускается при вызове php artisan migrate:rollback --step=1
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_code_1');
        });
    }
}
