<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeBloodTable extends Migration {

	public function up()
	{
		Schema::create('Type_bloods', function(Blueprint $table) {
			$table->id();
			$table->string('Name');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Type_blood');
	}
}
