<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Initial_Symptoms extends Model{
    protected $connection = 'patient_db';
    protected $table = 'Initial_Symptoms';
    public $timestamps = false;
    
    protected $primaryKey = 'basic_information_id'; // 如果主键字段不是递增的整数，设置为 false
    public $incrementing = false;
    protected $keyType = 'string'; 

    protected $fillable = [
        'basic_information_id',
        'Stool_OB',
        'Colonoscocopy',
        'CEA',
        'CT',
        'MRI',
        'PET',
        'Fresh_blood',
        'Bloody_stool',
        'Melanoma',
        'Small_caliber_of_stool',
        'Tenesmus',
        'Constipation',
        'Diarrhea',
        'Mucus_passage',
        'Abdomen_pain',
        'Abdomen_distention',
        'Abdomen_fullness',
        'Abdomen_mass',
        'Vomiting',
        'Loss_appetite',
        'Anemia',
        'weight_loss',
        'Peritonitis',
        'Distal_metastasis',
        'Other_SS',
        'Duration_Initial_symptom'
    ];

    // 定義與 BasicInformation 模型的反向一對多關聯
    public function basicInformation(){
        return $this->belongsTo(Basic_information::class, 'basic_information_id', 'Chart');
    }
}
