<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model{
    protected $connection ='user_db';
    protected $table = 'actions'; 
    protected $fillable = [
        'username', 'action'
    ];

   
}
