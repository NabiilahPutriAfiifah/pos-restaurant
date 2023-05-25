<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model {

    protected $table = 'jenis';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['jenis'];

}