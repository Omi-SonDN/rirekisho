<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->char('name_cv');
            $table->char('email');
            $table->text('Photo');
            $table->text('Request');
            $table->string('positions');
            $table->text('Memo');
            $table->tinyInteger('Active');
            $table->tinyInteger('Status')->default(1);
            $table->text('old_status');
            $table->tinyInteger('version');
            $table->tinyInteger('apply_to');
            $table->text('notes');
            $table->tinyInteger('type_cv');
            $table->tinyInteger('live');
            $table->string('attach');
            $table->string('github');
            $table->string('linkedin');
            $table->integer('active_by')->unsigned();
            $table->integer('user_gioi_thieu')->default(0);
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
        Schema::drop('cvs');
    }
}
