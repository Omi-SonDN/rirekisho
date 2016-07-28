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
            $table->char('First_name');
            $table->char('Last_name');
            $table->char('Furigana_name');
            $table->char('email');
            $table->text('Photo');
            $table->date('Birth_date');
            $table->tinyInteger('Gender');
            $table->text('Address');
            $table->text('Contact_information');
            $table->char('Phone');
            $table->text('Self_intro');
            $table->tinyInteger('Marriage');
            $table->tinyInteger('配偶者の扶養義務');
            $table->text('Request');
            $table->string('positions');
            $table->text('Memo');
            $table->tinyInteger('Active');
            $table->tinyInteger('Status');
            $table->tinyInteger('version');
            $table->tinyInteger('apply_to');
            $table->text('notes');
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
