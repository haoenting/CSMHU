<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postoperative_Condition extends Model{
    protected $connection = 'patient_db';
    protected $table = 'Postoperative_Condition';
    public $timestamps = false;
    
    protected $primaryKey = 'basic_information_id'; // 如果主键字段不是递增的整数，设置为 false
    public $incrementing = false;
    protected $keyType = 'string'; 
    
    protected $fillable = [
        'basic_information_id',
        'Cefazoline2',
        'Gentamicin2',
        'Metronidazole2',
        'Antiobitics_other',
        'DC4',
        'NG',
        'POD1',
        'PCA',
        'POD2',
        'Flatus',
        'Defecation',
        'Try_water',
        'Soft_diet',
        'Surgical',
        'Medical',
        'Complication_other',
        'Length_of_hospitalization',
        'Discharge',
        'Re_amission',
        'Motality'
    ];    

    // 定義與 BasicInformation 模型的反向一對多關聯
    public function basicInformation(){
        return $this->belongsTo(Basic_information::class, 'basic_information_id', 'Chart');
    }
}

