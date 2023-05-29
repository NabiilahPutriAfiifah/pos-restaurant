<?php 

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model {

    protected $table = 'penjualan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    
    protected $allowedFields = [
        'tanggal_penjualan', 
        'nama_kasir', 
        'sub_total',
        'diskon',
        'total_akhir',
        'tunai',
        'kembalian'
    ];   
}