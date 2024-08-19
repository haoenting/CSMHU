<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basic_information extends Model{
    protected $connection ='patient_db';
    protected $table = 'Basic_information'; 

    protected $primaryKey = 'Chart';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'Chart',
        'ID',
        'Name',
        'Birthday',
        'Gender',
        'Native',
        'Dx',
        'Visiting_staff',
        'Operator',
        'Source',
        'HNPCC',
        'FAP',
        'Date_of_initial_diagnosis',
        'Metastases',
        'Date_of_metastases_noted',
        'Time_of_last_follow',
        'Date_of_mortality',
        'Survival_time',
        'DT_summary',
        'creater'
    ];


    // Define the relationship with Past_History
    public function Past_History(){
        return $this->hasMany(Past_History::class, 'basic_information_id', 'Chart');
    }

    // Define the relationship with Initial_Symptoms
    public function Initial_Symptoms(){
        return $this->hasMany(Initial_Symptoms::class, 'basic_information_id', 'Chart');
    }

    // Define the relationship with Preoperative_Assessment
    public function Preoperative_Assessment(){
        return $this->hasMany(Preoperative_Assessment::class, 'basic_information_id', 'Chart');
    }

    // Define the relationship with Preoperative_Treatment
    public function Preoperative_Treatment(){
        return $this->hasMany(Preoperative_Treatment::class, 'basic_information_id', 'Chart');
    }

    // Define the relationship with CCRT
    public function CCRT(){
        return $this->hasMany(CCRT::class, 'basic_information_id', 'Chart');
    }

    // Define the relationship with Surgery
    public function Surgery(){
        return $this->hasMany(Surgery::class, 'basic_information_id', 'Chart');
    }

    // Define the relationship with Postoperative_Condition
    public function Postoperative_Condition(){
        return $this->hasMany(Postoperative_Condition::class, 'basic_information_id', 'Chart');
    }
      // Define the relationship with Pathology
      public function Pathology(){
        return $this->hasMany(Pathology::class, 'basic_information_id', 'Chart');
    }
    public function Adjuvant_Radiotherapy(){
        return $this->hasMany(Adjuvant_Radiotherapy::class, 'basic_information_id', 'Chart');
    }
    public function Chemotherapy(){
        return $this->hasMany(Chemotherapy::class, 'basic_information_id', 'Chart');
    }
    public function Colonoscopy(){
        return $this->hasMany(Colonoscopy::class, 'basic_information_id', 'Chart');
    }
    public function PET(){
        return $this->hasMany(PET::class, 'basic_information_id', 'Chart');
    }
    public function Tumor_maker(){
        return $this->hasMany(Tumor_maker::class, 'basic_information_id', 'Chart');
    }

}
