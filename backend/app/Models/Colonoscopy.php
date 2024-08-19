<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colonoscopy extends Model{
    protected $connection = 'patient_db';
    protected $table = 'Colonoscopy';
    public $timestamps = false;
    
    protected $primaryKey = 'basic_information_id';
    public $incrementing = false;
    protected $keyType = 'string'; 

    protected $fillable = [
        'basic_information_id',
        'ACt_1', 'ACF_1', 'ACPn_1', 'ACPs_1', 'ACo_1',
        'ACt_2', 'ACF_2', 'ACPn_2', 'ACPs_2', 'ACo_2',
        'ACt_3', 'ACF_3', 'ACPn_3', 'ACPs_3', 'ACo_3',
        'ACt_4', 'ACF_4', 'ACPn_4', 'ACPs_4', 'ACo_4',
        'ACt_5', 'ACF_5', 'ACPn_5', 'ACPs_5', 'ACo_5',
        'ACt_6', 'ACF_6', 'ACPn_6', 'ACPs_6', 'ACo_6',
        'ACt_7', 'ACF_7', 'ACPn_7', 'ACPs_7', 'ACo_7',
        'ACt_8', 'ACF_8', 'ACPn_8', 'ACPs_8', 'ACo_8',
        'ACt_9', 'ACF_9', 'ACPn_9', 'ACPs_9', 'ACo_9',
        'ACt_10', 'ACF_10', 'ACPn_10', 'ACPs_10', 'ACo_10',
    ];

    // 定義與 BasicInformation 模型的反向一對多關聯
    public function basicInformation(){
        return $this->belongsTo(Basic_information::class, 'basic_information_id', 'Chart');
    }
}
