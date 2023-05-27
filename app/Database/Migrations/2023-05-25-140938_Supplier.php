<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Supplier extends Migration {

	public function up() {

		// Supplier
		$this->forge->addField([

			'id'                => [
                'type'              => 'INT', 
                'constraint'        => 11, 
                'unsigned'          => true, 
                'auto_increment'    => true
            ],
			'nama'      => [
                'type'          => 'VARCHAR', 
                'constraint'    => 50
            ],
			'no_telp'      => [
                'type'          => 'VARCHAR', 
                'constraint'    => 20
            ],
			'email'      => [
                'type'          => 'VARCHAR', 
                'constraint'    => 50
            ],
			'alamat'    => [
                'type'          => 'VARCHAR', 
                'constraint'    => 100
            ],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('supplier', true);

		$this->db->table('supplier')->insertBatch([
            [
                'nama'  	=> 'PT Chinese Food',
                'no_telp' 	=> '08123413445',
                'email'  	=> 'chifood@gmail.com',
                'alamat'    => 'China'
            ],
            [
                'nama'  	=> 'PT Japanese Ate',
                'no_telp'   => '08765432`1234',
                'email' 	=> 'japanfu@gmail.com',
                'alamat'    => 'Tokyo, Japan'
            ],
            [
                'nama'  	=> 'PT Korean Kitchen',
                'no_telp'   => '087767662636',
                'email'  	=> 'Koki@gmail.com',
                'alamat'    => 'Seoul, Korea Selatan'
            ],
        ]);
	}

	//--------------------------------------------------------------------

	public function down() {

		$this->forge->dropTable('supplier', true);
	}
}