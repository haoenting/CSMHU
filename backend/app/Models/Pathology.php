<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pathology extends Model{
    protected $connection = 'patient_db';
    protected $table = 'Pathology';
    public $timestamps = false;
    
    protected $primaryKey = 'basic_information_id'; // 如果主键字段不是递增的整数，设置为 false
    public $incrementing = false;
    protected $keyType = 'string'; 
    
    protected $fillable = [
        'basic_information_id',
        'Tumor_long2',
        'Tumor_wide2',
        'Tumor_high2',
        'Tumor_Type',
        'Distal_Margin',
        'Call_type',
        'Differetiatnion',
        'Lypmhatic',
        'Vascular',
        'Perineural',
        'Synchronous_Polypo',
        'Synchronous_cancer',
        'Cut_margin_condition',
        'LN_examed',
        'LN_involved',
        'Final_T',
        'Final_N',
        'Final_M',
        'Final_stage'
    ];    

    // 定義與 BasicInformation 模型的反向一對多關聯
    public function basicInformation(){
        return $this->belongsTo(Basic_information::class, 'basic_information_id', 'Chart');
    }
}
