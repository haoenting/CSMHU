<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preoperative_Treatment extends Model{
    protected $connection = 'patient_db';
    protected $table = 'Preoperative_Treatment';
    public $timestamps = false;

    protected $primaryKey = 'basic_information_id'; // 如果主键字段不是递增的整数，设置为 false
    public $incrementing = false;
    protected $keyType = 'string'; 

    protected $fillable = [
        'basic_information_id',
        'Albumin2',
        'PPN',
        'TPN',
        'days',
        'P_RBC',
        'Whole_blood',
        'FFP',
        'Platelet',
        'Colon_preparation_Type',
        'Laxativs',
        'Oral_antibiotics',
        'Retention_enema',
        'Cafazolin',
        'Gentamicin',
        'Metronidazole',
        'Pre_OP_Other'
    ];
    // 定義與 BasicInformation 模型的反向一對多關聯
    public function basicInformation(){
        return $this->belongsTo(Basic_information::class, 'basic_information_id', 'Chart');
    }
}