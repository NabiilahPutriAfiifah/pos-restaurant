<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Master extends Migration {

	public function up() {

		// Kategori
		$this->forge->addField([
			'id'            => [
                'type'              => 'INT', 
                'constraint'	    => 11, 
                'unsigned'          => true, 
                'auto_increment'    => true
            ],
			'kategori'	=> [
                'type'          => 'VARCHAR', 
                'constraint'    => 50
            ],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('kategori', true);

        $this->db->table('kategori')->insertBatch([
            ['kategori' => 'Makanan'],
            ['kategori' => 'Minuman'],
        ]);

		// Jenis Menu
		$this->forge->addField([
			'id'        => [
                'type'              => 'INT', 
                'constraint'	    => 11, 
                'unsigned'          => true, 
                'auto_increment'    => true
            ],
			'jenis'	=> [
                'type'          => 'VARCHAR', 
                'constraint'    => 50
            ],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('jenis', true);

        $this->db->table('jenis')->insertBatch([
            ['jenis' => 'Western Food'],
            ['jenis' => 'Japanese Food'],
            ['jenis' => 'Nusantara Food'],
            ['jenis' => 'Chinese Food'],
            ['jenis' => 'Korean Food'],
        ]);

		// Menu
		$this->forge->addField([
			'id'            => [
                'type'              => 'INT', 
                'constraint'        => 11, 
                'unsigned'          => true, 
                'auto_increment'    => true
            ],
			'kode_menu'	    => [
                'type'          => 'VARCHAR', 
                'constraint'	=> 50,
            ],
			'nama_menu'	=> [
                'type'          => 'VARCHAR', 
                'constraint'	=> 100
            ],
			'id_kategori'	=> [
                'type'          => 'INT', 
                'constraint'	=> 11, 
                'unsigned'      => true
            ],
			'id_jenis'	    => [
                'type'          => 'INT', 
                'constraint'    => 11, 
                'unsigned'      => true
            ],
			'id_supplier'    => [
                'type'          => 'INT', 
                'constraint'    => 11, 
                'unsigned'      => true
            ],
			'harga'	        => [
                'type'          => 'INT', 
                'constraint'    => 11, 
                'unsigned'      => true
            ],
			'stok'	        => [
                'type'          => 'INT', 
                'constraint'	=> 11, 
                'unsigned'      => true
            ],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('id', true)->addKey(['id_kategori', 'id_jenis', 'id_supplier'])->addUniqueKey('kode_menu');

		$this->forge->addForeignKey('id_kategori', 'kategori', 'id', 'cascade', 'restrict');
		$this->forge->addForeignKey('id_jenis', 'jenis', 'id', 'cascade', 'restrict');
		$this->forge->addForeignKey('id_supplier', 'supplier', 'id', 'cascade', 'restrict');

		$this->forge->createTable('menu', true);
	}

	//--------------------------------------------------------------------

	public function down() {
		$this->forge->dropTable('kategori', true);
		$this->forge->dropTable('jenis', true);
		$this->forge->dropTable('menu', true);
	}
}