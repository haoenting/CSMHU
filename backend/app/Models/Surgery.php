<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surgery extends Model{
    protected $connection = 'patient_db';
    protected $table = 'Surgery';
    public $timestamps = false;

    protected $primaryKey = 'basic_information_id'; // 如果主键字段不是递增的整数，设置为 false
    public $incrementing = false;
    protected $keyType = 'string'; 
    
    protected $fillable = [
        'basic_information_id',
        'Operatin_date',
        'OP_method1',
        'OP_method2',
        'Extent_of_sugery',
        'Anesthesia_type',
        'OP_time',
        'Blood_loss',
        'P_RBC2',
        'Whole_blood2',
        'FFP2',
        'Platelet2',
        'Type_of_incision',
        'Ascitis_color',
        'Synchronous_colonic_tumor_site',
        'Peritoneal_seeding',
        'Tumor_site',
        'Type_of_Anastomosis',
        'Anastomosis_to_anal_verge',
        'Distal_distence',
        'Tumor_long',
        'Tumor_wide',
        'Tumor_High',
        'Type_of_tumor',
        'Perforation',
        'Obstruction2',
        'Invasion_other',
        'Combined_resection',
        'Palpable_LNs',
        'Liver_nodule',
        'Management',
        'Protective_stoma',
        'Intracolonic',
        'Reason_of_palliative_TX'
    ];
    
    // 定義與 BasicInformation 模型的反向一對多關聯
    public function basicInformation(){
        return $this->belongsTo(Basic_information::class, 'basic_information_id', 'Chart');
    }
}
