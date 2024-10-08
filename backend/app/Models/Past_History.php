<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Past_History extends Model{
    protected $connection = 'patient_db';
    protected $table = 'Past_History';
    public $timestamps = false;

    protected $primaryKey = 'basic_information_id'; // 如果主键字段不是递增的整数，设置为 false
    public $incrementing = false;
    protected $keyType = 'string'; 
    
    protected $fillable = [
        'basic_information_id',
        'DM',
        'HTM',
        'CVA',
        'CAD',
        'COPD',
        'CHF',
        'Liver_cirrhosis',
        'Gout',
        'MD_other',
        'Surgical_history',
        'Smoking',
        'Drinking',
        'Betal_nut',
        'Family_CRC_1',
        'Family_CRC_2',
        'Family_CRC_3',
        'Family_GI_cancer',
        'Family_other_cancer'
    ];

    // 定義與 BasicInformation 模型的反向一對多關聯
    public function basicInformation(){
        return $this->belongsTo(Basic_information::class, 'basic_information_id', 'Chart');
    }
}
