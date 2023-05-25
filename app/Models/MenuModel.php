<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model {

    protected $table = 'menu';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['kode_menu','nama_menu', 'id_kategori', 'id_jenis', 'id_supplier', 'harga', 'stok'];
}