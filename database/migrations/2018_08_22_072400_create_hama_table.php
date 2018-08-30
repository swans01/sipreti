<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHamaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hama', function(Blueprint $table)
		{
			$table->integer('periode')->primary();
			$table->string('accidoporax', 10);
			$table->string('apis', 10);
			$table->string('belalang', 10);
			$table->string('boluk', 10);
			$table->string('bulai', 10);
			$table->string('bule', 10);
			$table->string('brurkhulderia glumae', 10);
			$table->string('carcospora sp', 10);
			$table->string('cnaphacrosis sp', 10);
			$table->string('defisiensi unsur hara', 10);
			$table->string('helminthosporium sp', 10);
			$table->string('epinding tanah', 10);
			$table->string('kahat seng', 10);
			$table->string('karat daun', 10);
			$table->string('keongmas', 10);
			$table->string('kerdil rumput', 10);
			$table->string('lalat Bibit', 10);
			$table->string('nympulla sp', 10);
			$table->string('oxya sp', 10);
			$table->string('pegg batang', 10);
			$table->string('pegg pucuk', 10);
			$table->string('pengg tongkol', 10);
			$table->string('penggulung daun', 10);
			$table->string('peronospora', 10);
			$table->string('pitopthora sp', 10);
			$table->string('pirycularia Sp', 10);
			$table->string('plutella sp', 10);
			$table->string('pseudomonas sp', 10);
			$table->string('puccinia sp', 10);
			$table->string('rhizoctonia sp', 10);
			$table->string('siput murbei', 10);
			$table->string('thrips sp', 10);
			$table->string('tikus', 10);
			$table->string('tungro', 10);
			$table->string('ulat grayak', 10);
			$table->string('ulat daun', 10);
			$table->string('uret', 10);
			$table->string('ustilago', 10);
			$table->string('walang sangit', 10);
			$table->string('wbc', 10);
			$table->string('wpp', 10);
			$table->string('xanthomas sp', 10);
			$table->string('Suhu Rata Rata', 10);
			$table->string('Kelembapan', 10);
			$table->string('Curah Hujan', 10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hama');
	}

}
