<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'menu_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
            ],
            'customer_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
            ],
            'jumlah' => [
                'type'          => 'INT',
                'constraint'    => 11
            ]
        ]);

        $this->forge->addForeignKey('menu_id', 'menu', 'id');
        $this->forge->addForeignKey('customer_id', 'pelanggan', 'id');

        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}