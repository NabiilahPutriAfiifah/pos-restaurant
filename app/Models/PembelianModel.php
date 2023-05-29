<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['menu_id', 'customer_id', 'jumlah'];

    public function menu() {
        return $this->belongsTo(MenuModel::class, 'menu_id', 'id');
    }

    public function pelanggan() {
        return $this->belongsTo(PelangganModel::class, 'customer_id', 'id');
    }

    // public function getPembelian($id = false){
    //     if ($id == false) {
    //         return $this->findAll();
    //     }
    //     return $this->find($id);
    // }

    public function getDataItem(){
        return $this->select('menu.nama_menu, menu.harga, transaksi.jumlah, (menu.harga * jumlah) As total')
                    ->join('menu', 'menu.id = transaksi.menu_id')
                    ->join('pelanggan', 'pelanggan.id = transaksi.customer_id')
                    ->get()
                    ->getResult();
    }
}