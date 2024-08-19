<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tumor_maker extends Model{
    protected $connection = 'patient_db';
    protected $table = 'Tumor_maker';
    public $timestamps = false;
    
    protected $primaryKey = 'basic_information_id';
    public $incrementing = false;
    protected $keyType = 'string'; 

    protected $fillable = [
        'basic_information_id',
        'Td_1', 'TC_1', 'T125_1', 'T199_1', 'To_1',
        'Td_2', 'TC_2', 'T125_2', 'T199_2', 'To_2',
        'Td_3', 'TC_3', 'T125_3', 'T199_3', 'To_3',
        'Td_4', 'TC_4', 'T125_4', 'T199_4', 'To_4',
        'Td_5', 'TC_5', 'T125_5', 'T199_5', 'To_5',
        'Td_6', 'TC_6', 'T125_6', 'T199_6', 'To_6',
        'Td_7', 'TC_7', 'T125_7', 'T199_7', 'To_7',
        'Td_8', 'TC_8', 'T125_8', 'T199_8', 'To_8',
        'Td_9', 'TC_9', 'T125_9', 'T199_9', 'To_9',
        'Td_10', 'TC_10', 'T125_10', 'T199_10', 'To_10',
    ];

    // 定義與 BasicInformation 模型的反向一對多關聯
    public function basicInformation(){
        return $this->belongsTo(Basic_information::class, 'basic_information_id', 'Chart');
    }
}
