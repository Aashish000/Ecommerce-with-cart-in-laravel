<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('orders', function($table) {
            $table->string('name');
            $table->string('lastname');
            $table->bigInteger('phone');
            $table->string('address');
            $table->string('city');
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
        Schema::table('orders', function($table) {
         $table->dropColumn('name');
         $table->dropColumn('lastname');
         $table->dropColumn('phone');
         $table->dropColumn('address');
         $table->dropColumn('city');
         $table->dropColumn('country');
        });
    
    }
}
