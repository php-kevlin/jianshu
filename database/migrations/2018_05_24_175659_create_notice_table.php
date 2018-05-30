<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('notices',function (Blueprint $table){
        $table->increments('id');
        $table->string('title',50)->default('');
        $table->string('description',100)->default('');
        $table->timestamps();
        });

        Schema::create('user_notice',function (Blueprint $table){
            $table->increments('id');
            $table->string('user_id',50)->default(0);
            $table->string('notice_id',100)->default(0);
             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('notices');
        Schema::dropIfExists('user_notice');
    }
}
