<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedirectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('redirects', function($table) {

        // Increments method will make a Primary, Auto-Incrementing field.
        // Most tables start off this way
        $table->increments('id');

        $table->string('redirect_key');
        $table->text('shortened_url');
        $table->integer('hits');
        $table->boolean('custom_key');
        // Foreign Key
        $table->integer('user_id')->unsigned()->nullable();
		$table->foreign('user_id')->references('id')->on('users'); 

		// Timestamp
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
		Schema::drop('redirects');
	}

}
