<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('email', 50);
			$table->string('username', 20);
			$table->string('password', 60);
			$table->string('password_temp', 60);
			$table->string('code', 60);
			$table->string('remember_token', 100);
			$table->integer('active');
			$table->timestamps();
		});

		Schema::create('types', function($table)
		{
			$table->increments('id');
			$table->string('label', 128);
			$table->boolean('unique_items');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->timestamps();
		});

		Schema::create('states', function($table)
		{
			$table->increments('id');
			$table->string('label', 128);
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->timestamps();
		});

		Schema::create('items', function($table)
		{
			$table->increments('id');
			$table->string('label', 128);
			$table->integer('type_id')->unsigned();
			$table->foreign('type_id')->references('id')->on('types');
			$table->integer('state_id')->unsigned();
			$table->foreign('state_id')->references('id')->on('states');
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
		Schema::drop('users');
		Schema::drop('types');
		Schema::drop('states');
		Schema::drop('items');
	}

}