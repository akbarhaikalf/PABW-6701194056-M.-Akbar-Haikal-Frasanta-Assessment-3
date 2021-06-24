<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Akun extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 255,
					'auto_increment' => true,
			],
			'username'       => [
					'type'       => 'VARCHAR',
					'constraint' => '200',
			],
			'password' => [
					'type' => 'VARCHAR',
					'constraint' => '200',
			],
			'nama_lengkap' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
			],
			'tanggal_lahir' => [
					'type' => 'DATETIME',
			],
			'jenis_kelamin' => [
					'type' => 'VARCHAR',
					'constraint' => '200',
			],
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('Akun');
	}

	public function down()
	{
		$this->forge->dropTable('Akun');
	}
}
