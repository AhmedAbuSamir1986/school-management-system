<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNationalitiesTable extends Migration {

	public function up()
	{
		Schema::create('Nationalities', function(Blueprint $table) {
			$table->id();
            $table->string('Name');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Nationalities');
	}
}
