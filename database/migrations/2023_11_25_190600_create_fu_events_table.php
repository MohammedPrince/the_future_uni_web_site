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
        Schema::create('fu_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_title',100)->unique();
            $table->text('event_desc');
            $table->string('event_time');
            $table->date('event_date');
            $table->string('event_imgs',255);
            $table->string('faculty_id');
            $table->integer('event_by')->default(0);
            $table->integer('event_status')->default(0);
            $table->integer('del')->default(0);
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
        Schema::dropIfExists('fu_events');
    }
};
