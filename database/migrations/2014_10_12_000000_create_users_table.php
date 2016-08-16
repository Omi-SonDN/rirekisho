<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userName');
            $table->string('email')->unique();
            $table->tinyInteger('role')->default(0);
            $table->string('password', 60);
            $table->rememberToken();
            $table->string('note');
            $table->tinyInteger('active')->unsigned();
            $table->string('image')->nullable();
            $table->char('First_name');
            $table->char('Last_name');
            $table->char('Furigana_name');
            $table->date('Birth_date');
            $table->tinyInteger('Gender');
            $table->text('Address');
            $table->text('Contact_information');
            $table->char('Phone');
            $table->text('Self_intro');
            $table->tinyInteger('Marriage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('users');
    }
}
