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
        Schema::create('fu_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('news_title',100)->unique();
            $table->text('news_desc');
            $table->date('news_date');
            $table->string('news_imgs',255);
            $table->string('faculty_id');
            $table->integer('news_by')->default(0);
            $table->integer('news_status')->default(0);
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
        Schema::dropIfExists('fu_news');
    }
};
