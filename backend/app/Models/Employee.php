<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model{
    protected $connection ='user_db';
    protected $table = 'employee'; 
    protected $fillable = [
        'username', 'account', 'password'
    ];

    protected $hidden = [
        'password', // 在序列化模型時隱藏密碼字段
    ];
}
