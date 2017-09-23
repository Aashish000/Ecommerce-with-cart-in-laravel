<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('lastname');
            $table->bigInteger('phone');
            $table->string('address');
            $table->string('gender');            
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
            $table->dropColumn('lastname');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('gender');

        });
    }
}
