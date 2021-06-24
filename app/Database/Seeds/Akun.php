<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Akun extends Seeder
{
	public function run()
	{
		$data = [
			'username' => 'akbarhaikal',
			'password'    => 'akbrhkl11',
			'nama_lengkap' => 'Muhammad Akbar Haikal Frasanta',
			'tanggal_lahir' => '11 Juli 2001',
			'jenis_kelamin' => 'Pria'
	];

	// Simple Queries
	$this->db->query("INSERT INTO Akun (username, password, nama_lengkap, tanggal_lahir, jenis_kelamin) 
	VALUES(:username:, :password:, :nama_lengkap:, :tanggal_lahir:, :jenis_kelamin:)", $data);

	// Using Query Builder
	$this->db->table('Akun')->insert($data);
	}
}
