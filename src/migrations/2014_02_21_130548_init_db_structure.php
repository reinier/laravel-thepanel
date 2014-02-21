<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitDbStructure extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('users'))
		{
	        Schema::create('users', function($table) {

	        	$table->engine = 'InnoDB';
	            $table->increments('id');

				$table->string('publichash');
	            $table->string('username');
				$table->string('email');
				$table->unique('email');
				$table->string('password');
				$table->string('name');
				$table->integer('activated');
				$table->string('role')->default('contributor');
				$table->text('bio');
	            $table->timestamps();
	        });
	    }

	    if (!Schema::hasTable('links'))
		{
			Schema::create('links', function($table) {
				$table->engine = 'InnoDB';
	            $table->increments('id');

	            $table->integer('user_id');
				$table->string('title');
	            $table->string('url');
	            $table->timestamps();
	            $table->softDeletes();
	            $table->string('kind')->default('thing');
			    $table->text('reason')->nullable();
	        });
		}

		if (!Schema::hasTable('votes'))
		{
	        Schema::create('votes', function($table) {
	        	$table->engine = 'InnoDB';
	            $table->increments('id');

	            $table->integer('user_id');
				$table->integer('link_id');
	            $table->timestamps();
	        });
		}

		if (!Schema::hasTable('password_reminders'))
		{
	        Schema::create('password_reminders', function($table)
			{
				$table->engine = 'InnoDB';

				$table->string('email');
				$table->string('token');
				$table->timestamp('created_at');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		Schema::drop('links');
		Schema::drop('votes');
		Schema::drop('password_reminders');
	}

}
