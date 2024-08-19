<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PET extends Model{
    protected $connection = 'patient_db';
    protected $table = 'PET';
    public $timestamps = false;
    
    protected $primaryKey = 'basic_information_id';
    public $incrementing = false;
    protected $keyType = 'string'; 

    protected $fillable = [
        'basic_information_id',
        'PETt_1', 'PETf_1', 'PETo_1',
        'PETt_2', 'PETf_2', 'PETo_2',
        'PETt_3', 'PETf_3', 'PETo_3',
        'PETt_4', 'PETf_4', 'PETo_4',
        'PETt_5', 'PETf_5', 'PETo_5',
        'PETt_6', 'PETf_6', 'PETo_6',
        'PETt_7', 'PETf_7', 'PETo_7',
        'PETt_8', 'PETf_8', 'PETo_8',
        'PETt_9', 'PETf_9', 'PETo_9',
        'PETt_10', 'PETf_10', 'PETo_10',
    ];

    // 定義與 BasicInformation 模型的反向一對多關聯
    public function basicInformation(){
        return $this->belongsTo(Basic_information::class, 'basic_information_id', 'Chart');
    }
}
