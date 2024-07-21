<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use App\Models\Basic_information;
// use App\Models\Past_History;
// use App\Models\InitialSymptoms;
// use App\Models\PreoperativeAssessment;
// use App\Models\PreoperativeTreatment;
// use App\Models\CCRT;
// use App\Models\Surgery;
// use App\Models\PostoperativeCondition;
// use App\Models\Pathology;
// use App\Models\Tracking;

class DataController extends Controller{
    public function test(Request $request){
        $formData = $request->all();

        $basicInfoData = $formData['basicInfo'];
        $pastHistoryData = $formData['pastHistory'];
        $initialSymptomsData = $formData['initialSymptoms'];
        $preoperativeAssessmentData = $formData['preoperativeAssessment'];
        $preoperativeTreatmentData = $formData['preoperativeTreatment'];
        $ccrtData = $formData['ccrt'];
        $surgeryData = $formData['surgery'];
        $postoperativeConditionData = $formData['postoperativeCondition'];
        $pathologyData = $formData['pathology'];
        $trackingData = $formData['tracking'];

        // Check if the ID exists
        $existingRecord = Basic_information::where('ID', $basicInfoData['ID'])->first();

        if ($existingRecord) {
            return response()->json([
                'success' => false,
                'message' => '身分證已存在!'
            ], 409); 
        }

        // $rules = [
        //     'Chart' => 'required|string|max:255',
        //     'ID' => 'required|string|unique:Basic_information',
        //     'Name' => 'required|string|max:255',
        // ];

        // // 創建驗證器
        // $validator = Validator::make( $basicInfoData, $rules);

        // // 如果驗證失敗
        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 400);
        // }
            
        Basic_information::create([
            'Chart' => $basicInfoData['Chart'],
            'ID' => $basicInfoData['ID'],
            'Name' => $basicInfoData['Name'],
            'Birthday' => $basicInfoData['Birthday'],
            'Gender' => $basicInfoData['Gender'],
            'Native' => $basicInfoData['Native'],
            'Dx' => $basicInfoData['Dx'],
            'Visiting_staff' => $basicInfoData['Visiting_staff'],
            'Operator' => $basicInfoData['Operator'],
            'Source' => $basicInfoData['Source'],
            'HNPCC' => $basicInfoData['HNPCC'],
            'FAP' => $basicInfoData['FAP'],
            'Date_of_initial_diagnosis' => $basicInfoData['Date_of_initial_diagnosis'],
            'Metastases' => $basicInfoData['Metastases'],
            'Date_of_metastases_noted' => $basicInfoData['Date_of_metastases_noted'],
            'Time_of_last_follow' => $basicInfoData['Time_of_last_follow'],
            'Date_of_mortality' => $basicInfoData['Date_of_mortality'],
            'Survival_time' => $basicInfoData['Survival_time'],
            'DT_summary' => $basicInfoData['DT_summary']
        ]);
        

        return response()->json([
            'success' => true,
            'message' => '資料新增成功!',
        ]);
    }

    public function insert(Request $request){ 
        $formData = $request->all();

        $basicInfoData = $formData['basicInfo'];
        $pastHistoryData = $formData['pastHistory'];
        $initialSymptomsData = $formData['initialSymptoms'];
        $preoperativeAssessmentData = $formData['preoperativeAssessment'];
        $preoperativeTreatmentData = $formData['preoperativeTreatment'];
        $ccrtData = $formData['ccrt'];
        $surgeryData = $formData['surgery'];
        $postoperativeConditionData = $formData['postoperativeCondition'];
        $pathologyData = $formData['pathology'];
        $trackingData = $formData['tracking'];

         // 定義醫生表單的驗證規則
        $rules = [
            'Chart' => 'required|string|max:255',
            'ID' => 'required|string|unique:Basic_information',
            'Name' => 'required|string|max:255',
        ];

        // 創建驗證器
        $validator = Validator::make($request->all(), $rules);

        // 如果驗證失敗
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        BasicInformation::create($formData['basicInfo']);

        // try {
            
        //     PastHistory::create($formData['basicInfo']);
        //     InitialSymptoms::create($formData['initialSymptoms']);
        //     PreoperativeAssessment::create($formData['preoperativeAssessment']);
        //     PreoperativeTreatment::create($formData['preoperativeTreatment']);
        //     CCRT::create($formData['ccrt']);
        //     Surgery::create($formData['surgery']);
        //     PostoperativeCondition::create($formData['postoperativeCondition']);
        //     Pathology::create($formData['pathology']);
        //     Tracking::create($formData['tracking']);

        //     return response()->json(['message' => 'Data stored successfully'], 200);

        // } catch (ValidationException $e) {
        //     return response()->json(['error' => $e->getMessage()], 400);
        // }
    }
}
