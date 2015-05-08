<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notices', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('receiver_id')->unsigned();
			$table->string('sender_title');
			$table->string('sender_age');
			$table->string('edu_qual');
			$table->string('description')->nullable();
            $table->text('template');
            $table->smallInteger('content')->default(0);
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
		Schema::drop('notices');
	}

}
