<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('views', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->ipAddress('visitor');
			$table->integer('question_id')->unsigned();
			$table->integer('user_id')->unsigned()->nullable();
			$table->timestamps();

			$table->foreign('question_id')->references('id')->on('questions');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('views');
	}
}
