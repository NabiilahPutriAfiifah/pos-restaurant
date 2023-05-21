<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class UserModel extends Model
{
    // Table
    protected $table = 'users';
    
    // allowed fields to manage
    protected $allowedFields = ['name', 'email', 'password'];
}