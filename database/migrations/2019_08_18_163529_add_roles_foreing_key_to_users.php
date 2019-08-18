<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRolesForeingKeyToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::table('users', 'role_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id')->after('id');
                $table->foreign('role_id')
                    ->references('id')
                    ->on('roles');
            });
        }
    }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public
        function down()
        {
            if (Schema::table('users', 'role_id')) {
                Schema::table('users', function (Blueprint $table) {
                    $table->dropForeign('role_id');
                    $table->dropColumn('role_id');
                });
            }
        }

}
