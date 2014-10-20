<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create users table
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->boolean('is_admin');
			$table->timestamps();
		});

		Schema::create('items', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('amount');
			$table->text('description');
			$table->timestamps();
		});

		Schema::create('reservations', function($table){
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('item_id')->unsigned();
			$table->foreign('item_id')->references('id')->on('items');
			$table->dateTime('start_date');
			$table->dateTime('end_date');
			$table->text('message')->nullable();
			$table->integer('status')->default(1);
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
		// Drops user table
		Schema::drop('reservations');
		Schema::drop('items');
		Schema::drop('users');
	}

}
