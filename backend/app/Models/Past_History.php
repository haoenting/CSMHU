<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastHistory extends Model{
    protected $connection = 'patient_db';
    protected $table = 'Past_History';
    public $timestamps = false;

    // 定義與 BasicInformation 模型的反向一對多關聯
    public function basicInformation()
    {
        return $this->belongsTo(BasicInformation::class, 'basic_information_id', 'ID');
    }
}
