<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTokenIdToPrescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prescriptions', function(Blueprint $table)
		{
            $table->integer('token_id')->unsigned();
            $table->foreign('token_id')
                ->references('id')->on('tokens')
                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prescriptions', function(Blueprint $table)
		{
			$table->dropForeign('token_id');
		});
	}

}
