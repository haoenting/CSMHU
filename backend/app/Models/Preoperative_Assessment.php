<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preoperative_Assessment extends Model{
    protected $connection = 'patient_db';
    protected $table = 'Preoperative_Assessment';
    public $timestamps = false;

    protected $primaryKey = 'basic_information_id'; // 如果主键字段不是递增的整数，设置为 false
    public $incrementing = false;
    protected $keyType = 'string'; 
    
    protected $fillable = [
        'basic_information_id',
        'Hemoglobin',
        'WBC',
        'Platelet',
        'GOT',
        'GPT',
        'ALk',
        'BilT',
        'BilD',
        'Albumin',
        'BUN',
        'Creatinine',
        'Na',
        'K',
        'PT',
        'APTT',
        'INR',
        'CEA',
        'CA125',
        'CA199',
        'Other4_1',
        'Stool_OB2',
        'Bone_scan',
        'MRI2',
        'PET_scan',
        'Scopy',
        'Scopy_c',
        'Up_to',
        'Obstruction',
        'Tumor_location',
        'Distence_from_AV',
        'Polyps1',
        'CXR',
        'Wall_thickening',
        'Involving_adjvcent_organ',
        'LN_enlargement',
        'Liver_lodules',
        'Other4_2',
        'Barium_enema',
        'Polyps2',
        'Abdominal_sonography',
        'Noudle_number',
        'Other4_3',
        'Other4_4',
    ];
    

    // 定義與 BasicInformation 模型的反向一對多關聯
    public function basicInformation(){
        return $this->belongsTo(Basic_information::class, 'basic_information_id', 'Chart');
    }
}
