<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adjuvant_Radiotherapy extends Model{
    protected $connection = 'patient_db';
    protected $table = 'Adjuvant_Radiotherapy';
    public $timestamps = false;
    
    protected $primaryKey = 'basic_information_id';
    public $incrementing = false;
    protected $keyType = 'string'; 

    protected $fillable = [
        'basic_information_id',
        's_1', 'e_1', 'd_1',
        's_2', 'e_2', 'd_2',
        's_3', 'e_3', 'd_3',
        's_4', 'e_4', 'd_4',
        's_5', 'e_5', 'd_5',
        's_6', 'e_6', 'd_6',
        's_7', 'e_7', 'd_7',
        's_8', 'e_8', 'd_8',
        's_9', 'e_9', 'd_9',
        's_10','e_10', 'd_10',
    ];

    // 定義與 BasicInformation 模型的反向一對多關聯
    public function basicInformation(){
        return $this->belongsTo(Basic_information::class, 'basic_information_id', 'Chart');
    }
}
