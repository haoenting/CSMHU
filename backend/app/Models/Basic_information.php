<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basic_information extends Model{
    protected $connection ='patient_db';
    protected $table = 'Basic_information'; 
    protected $primaryKey = 'ID';
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
        'DT_summary'
    ];
}
