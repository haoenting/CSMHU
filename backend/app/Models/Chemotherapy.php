<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chemotherapy extends Model{
    protected $connection = 'patient_db';
    protected $table = 'Chemotherapy';
    public $timestamps = false;
    
    protected $primaryKey = 'basic_information_id';
    public $incrementing = false;
    protected $keyType = 'string'; 

    protected $fillable = [
        'basic_information_id',
        'start_1', 'end_1',
        'start_2', 'end_2',
        'start_3', 'end_3',
        'start_4', 'end_4',
        'start_5', 'end_5',
        'start_6', 'end_6',
        'start_7', 'end_7',
        'start_8', 'end_8',
        'start_9', 'end_9',
        'start_10', 'end_10',
    ];

    // 定義與 BasicInformation 模型的反向一對多關聯
    public function basicInformation(){
        return $this->belongsTo(Basic_information::class, 'basic_information_id', 'Chart');
    }
}
