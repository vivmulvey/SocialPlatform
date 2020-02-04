<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          
          $table->date('date_of_birth');
          $table->string('phone_number');
          $table->string('location');
          $table->string('interest');
          $table->string('bio');
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

          $table->dropColumn('date_of_birth');
          $table->dropColumn('phone_number');
          $table->dropColumn('location');
          $table->dropColumn('interest');
          $table->dropColumn('bio');
        });
    }
}
