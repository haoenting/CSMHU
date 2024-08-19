<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CCRT extends Model{
    protected $connection = 'patient_db';
    protected $table = 'CCRT';
    public $timestamps = false;
    
    protected $primaryKey = 'basic_information_id';
    public $incrementing = false;
    protected $keyType = 'string'; 

    protected $fillable = [
        'basic_information_id',
        'UFT',
        'Xeloda',
        'Neoadjavent_dose',
        'Side_effect',
        'Time_to_surgery'
    ];

    // 定義與 BasicInformation 模型的反向一對多關聯
    public function basicInformation(){
        return $this->belongsTo(Basic_information::class, 'basic_information_id', 'Chart');
    }
}
