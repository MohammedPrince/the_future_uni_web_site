<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('user_fullname',50);
            $table->string('user_phone',12)->unique();;
            $table->string('user_email')->unique();
            $table->integer('user_faculty')->default(0);
            $table->integer('isAdmin')->default(1);
            $table->integer('user_by')->default(0);
            $table->timestamp('user_add_date')->nullable();
            $table->timestamp('user_update_date')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->integer('del')->default(0);
            

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
};
