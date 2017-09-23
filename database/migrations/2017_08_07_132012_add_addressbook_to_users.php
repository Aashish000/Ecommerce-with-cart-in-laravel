<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressbookToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('users', function($table) {
            $table->string('city');
            $table->string('state');
            $table->integer('postal_code');
            $table->string('country');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('users', function($table) {
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('postal_code');
            $table->dropColumn('country');


         });
    }
}
