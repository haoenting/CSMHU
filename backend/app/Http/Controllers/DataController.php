<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use App\Models\Action;
use App\Models\Basic_information;
use App\Models\Past_History;
use App\Models\Initial_Symptoms;
use App\Models\Preoperative_Assessment;
use App\Models\Preoperative_Treatment;
use App\Models\CCRT;
use App\Models\Surgery;
use App\Models\Postoperative_Condition;
use App\Models\Pathology;
use App\Models\Chemotherapy;
use App\Models\Adjuvant_Radiotherapy;
use App\Models\Tumor_maker;
use App\Models\Colonoscopy;
use App\Models\PET;



class DataController extends Controller{
    public function insert(Request $request){
        $formData = $request->all();
        $basicInfoData['creater'] = $formData['username'];
        
        // Check if the ID exists
        $basicInfoData = $formData['basicInfo'];
        $existingRecord = Basic_information::where('Chart', $basicInfoData['Chart'])->first();
        if ($existingRecord) {
            return response()->json(['message' => '資料已登陸!'], 409); 
        }
         
        // Basic_information
        $rules= [
            'Chart'=> 'string',
            'ID'=> 'nullable|string',
            'Name'=> 'nullable|string',
            'Birthday'=> 'nullable|date',
            'Gender'=> 'nullable|string',
            'Native'=> 'nullable|string',
            'Dx'=> 'nullable|string',
            'Visiting_staff'=> 'nullable|string',
            'Operator'=> 'nullable|string',
            'Source'=> 'nullable|string',
            'HNPCC'=> 'nullable|boolean',
            'FAP'=> 'nullable|boolean',
            'Date_of_initial_diagnosis'=> 'nullable|date',
            'Metastases'=> 'nullable|boolean',
            'Date_of_metastases_noted'=> 'nullable|date',
            'Time_of_last_follow'=> 'nullable|date',
            'Date_of_mortality'=> 'nullable|date',
            'Survival_time'=> 'nullable|string',
            'DT_summary'=> 'nullable|string',
            'creater'=> 'nullable|string',
        ];
        $validator = Validator::make( $basicInfoData, $rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return response()->json([
                'error' => $errors,
            ], 400);
        }
        
        
        // PastHistory
        $pastHistoryData = $formData['pastHistory'];
        $pastHistoryData['basic_information_id'] = $basicInfoData['Chart'];
        $rules=[
            'DM' => 'nullable|boolean',
            'HTM' => 'nullable|boolean',
            'CVA' => 'nullable|boolean',
            'CAD' => 'nullable|boolean',
            'COPD' => 'nullable|boolean',
            'CHF' => 'nullable|boolean',
            'Liver_cirrhosis' => 'nullable|boolean',
            'Gout' => 'nullable|boolean',
            'MD_other' => 'nullable|string',
            'Surgical_history' => 'nullable|string',
            'Smoking' => 'nullable|string',
            'Drinking' => 'nullable|string',
            'Betal_nut' => 'nullable|string',
            'Family_CRC_1' => 'nullable|boolean',
            'Family_CRC_2' => 'nullable|boolean',
            'Family_CRC_3' => 'nullable|boolean',
            'Family_GI_cancer' => 'nullable|boolean',
            'Family_other_cancer' => 'nullable|string'
        ];
        $validator = Validator::make( $pastHistoryData, $rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return response()->json(['error' => $errors,], 400);
        } 
        
        // Initial_Symptoms
        $initialSymptomsData = $formData['initialSymptoms'];
        $initialSymptomsData['basic_information_id'] = $basicInfoData['Chart'];
        $rules=[
            'Stool_OB'=> 'nullable|boolean',
            'Colonoscocopy'=> 'nullable|boolean',
            'CEA'=> 'nullable|boolean',
            'CT'=> 'nullable|boolean',
            'MRI'=> 'nullable|boolean',
            'PET'=> 'nullable|boolean',
            'Fresh_blood'=> 'nullable|boolean',
            'Bloody_stool'=> 'nullable|boolean',
            'Melanoma'=> 'nullable|boolean',
            'Small_caliber_of_stool'=> 'nullable|boolean',
            'Tenesmus'=> 'nullable|boolean',
            'Constipation'=> 'nullable|boolean',
            'Diarrhea'=> 'nullable|boolean',
            'Mucus_passage'=> 'nullable|boolean',
            'Abdomen_pain'=> 'nullable|boolean',
            'Abdomen_distention'=> 'nullable|boolean',
            'Abdomen_fullness'=> 'nullable|boolean',
            'Abdomen_mass'=> 'nullable|boolean',
            'Vomiting'=> 'nullable|boolean',
            'Loss_appetite'=> 'nullable|boolean',
            'Anemia'=> 'nullable|boolean',
            'weight_loss'=> 'nullable|string',
            'Peritonitis'=> 'nullable|boolean',
            'Distal_metastasis'=> 'nullable|string',
            'Other_SS'=> 'nullable|string',
            'Duration_Initial_symptom'=> 'nullable|string',
        ];
        $validator = Validator::make($initialSymptomsData, $rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return response()->json(['error' => $errors], 400);
        }

        // Preoperative_Assessment
        $preoperativeAssessmentData = $formData['preoperativeAssessment'];
        $preoperativeAssessmentData['basic_information_id'] = $basicInfoData['Chart'];
        $rules=[
            'Hemoglobin'=> 'nullable|string',
            'WBC'=> 'nullable|string',
            'Platelet'=> 'nullable|string',
            'GOT'=> 'nullable|string',
            'GPT'=> 'nullable|string',
            'ALk'=> 'nullable|string',
            'BilT'=> 'nullable|string',
            'BilD'=> 'nullable|string',
            'Albumin'=> 'nullable|string',
            'BUN'=> 'nullable|string',
            'Creatinine'=> 'nullable|string',
            'Na'=> 'nullable|string',
            'K'=> 'nullable|string',
            'PT'=> 'nullable|string',
            'APTT'=> 'nullable|string',
            'INR'=> 'nullable|string',
            'CEA'=> 'nullable|string',
            'CA125'=> 'nullable|string',
            'CA199'=> 'nullable|string',
            'Other4_1'=> 'nullable|string',
            'Stool_OB2'=> 'nullable|string',
            'Bone_scan'=> 'nullable|string',
            'MRI2'=> 'nullable|boolean',
            'PET_scan'=> 'nullable|string',
            'Scopy'=> 'nullable|string',
            'Scopy_c'=> 'nullable|string',
            'Up_to'=> 'nullable|string',
            'Obstruction'=> 'nullable|string',
            'Tumor_location'=> 'nullable|string',
            'Distence_from_AV'=> 'nullable|string',
            'Polyps1'=> 'nullable|boolean',
            'CXR'=> 'nullable|string',
            'Wall_thickening'=> 'nullable|boolean',
            'Involving_adjvcent_organ'=> 'nullable|boolean',
            'LN_enlargement'=> 'nullable|boolean',
            'Liver_lodules'=> 'nullable|boolean',
            'Other4_2'=> 'nullable|string',
            'Barium_enema'=> 'nullable|string',
            'Polyps2'=> 'nullable|boolean',
            'Abdominal_sonography'=> 'nullable|string',
            'Noudle_number'=> 'nullable|string',
            'Other4_3'=> 'nullable|string',
            'Other4_4'=> 'nullable|string',
        ];
        $validator = Validator::make( $preoperativeAssessmentData, $rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return response()->json(['error' => $errors], 400);
        }
     
        // Rreoperative_Treament
        $preoperativeTreatmentData = $formData['preoperativeTreatment'];
        $preoperativeTreatmentData['basic_information_id'] = $basicInfoData['Chart'];
        $rules=[
            'Albumin2'=> 'nullable|boolean',
            'PPN'=> 'nullable|boolean',
            'TPN'=> 'nullable|boolean',
            'days'=> 'nullable|string',
            'P_RBC'=> 'nullable|string',
            'Whole_blood'=> 'nullable|string',
            'FFP'=> 'nullable|string',
            'Platelet'=> 'nullable|string',
            'Colon_preparation_Type'=> 'nullable|string',
            'Laxativs'=> 'nullable|string',
            'Oral_antibiotics'=> 'nullable|boolean',
            'Retention_enema'=> 'nullable|boolean',
            'Cafazolin'=> 'nullable|boolean',
            'Gentamicin'=> 'nullable|boolean',
            'Metronidazole'=> 'nullable|boolean',
            'Pre_OP_Other' => 'nullable|string',
        ];
        $validator = Validator::make( $preoperativeTreatmentData, $rules);
        if ($validator->fails()) {
            return response()->json(['error' => 'preoperativeTreatment'], 400);
        }

        // CCRT 
        $ccrtData = $formData['ccrt'];
        $ccrtData['basic_information_id'] = $basicInfoData['Chart'];
        $rules=[
            'UFT'=> 'nullable|boolean',
            'Xeloda'=> 'nullable|boolean',
            'Neoadjavent_dose'=> 'nullable|string',
            'Side_effect'=> 'nullable|string',
            'Time_to_surgery'=> 'nullable|string',
        ];
        $validator = Validator::make( $ccrtData, $rules);
        if ($validator->fails()) {
            return response()->json(['error' => 'ccrt'], 400);
        }
      
        // Surgery
        $surgeryData = $formData['surgery'];
        $surgeryData['basic_information_id'] = $basicInfoData['Chart'];
        $rules=[
            'Operatin_date'=> 'nullable|date',
            'OP_method1'=> 'nullable|string',
            'OP_method2'=> 'nullable|string',
            'Extent_of_sugery'=> 'nullable|string',
            'Anesthesia_type'=> 'nullable|string',
            'OP_time'=> 'nullable|string',
            'Blood_loss'=> 'nullable|string',
            'P_RBC2'=> 'nullable|string',
            'Whole_blood2'=> 'nullable|string',
            'FFP2'=> 'nullable|string',
            'Platelet2'=> 'nullable|string',
            'Type_of_incision'=> 'nullable|string',
            'Ascitis_color'=> 'nullable|string',
            'Synchronous_colonic_tumor_site'=> 'nullable|string',
            'Peritoneal_seeding'=> 'nullable|boolean',
            'Tumor_site'=> 'nullable|string',
            'Type_of_Anastomosis'=> 'nullable|string',
            'Anastomosis_to_anal_verge'=> 'nullable|string',
            'Distal_distence'=> 'nullable|string',
            'Tumor_long'=> 'nullable|string',
            'Tumor_wide'=> 'nullable|string',
            'Tumor_High'=> 'nullable|string',
            'Type_of_tumor'=> 'nullable|string',
            'Perforation'=> 'nullable|boolean',
            'Obstruction2'=> 'nullable|boolean',
            'Invasion_other'=> 'nullable|string',
            'Combined_resection'=> 'nullable|boolean',
            'Palpable_LNs'=> 'nullable|string',
            'Liver_nodule'=> 'nullable|string',
            'Management'=> 'nullable|string',
            'Protective_stoma'=> 'nullable|string',
            'Intracolonic'=> 'nullable|boolean',
            'Reason_of_palliative_TX' => 'nullable|string'
        ];
        $validator = Validator::make( $surgeryData, $rules);
        if ($validator->fails()) {
            return response()->json(['error' => 'surgery'], 400);
        }
        
        // Postoperative_Condition
        $postoperativeConditionData = $formData['postoperativeCondition'];
        $postoperativeConditionData['basic_information_id'] = $basicInfoData['Chart'];
        $rules=[
            'Cefazoline2'=> 'nullable|string',
            'Gentamicin2'=> 'nullable|string',
            'Metronidazole2'=> 'nullable|string',
            'Antiobitics_other'=> 'nullable|string',
            'DC4'=> 'nullable|string',
            'NG'=> 'nullable|string',
            'POD1'=> 'nullable|string',
            'PCA'=> 'nullable|string',
            'POD2'=> 'nullable|string',
            'Flatus'=> 'nullable|string',
            'Defecation'=> 'nullable|string',
            'Try_water'=> 'nullable|string',
            'Soft_diet'=> 'nullable|string',
            'Surgical'=> 'nullable|string',
            'Medical'=> 'nullable|string',
            'Complication_other'=> 'nullable|string',
            'Length_of_hospitalization'=> 'nullable|string',
            'Discharge'=> 'nullable|string',
            'Re_amission'=> 'nullable|boolean',
            'Motality'=> 'nullable|boolean',
        ];
        $validator = Validator::make( $postoperativeConditionData, $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
       
   
       // Pathology
        $pathologyData = $formData['pathology'];
        $pathologyData['basic_information_id'] = $basicInfoData['Chart'];
        $rules=[
            'Tumor_long2'=> 'nullable|string',
            'Tumor_wide2'=> 'nullable|string',
            'Tumor_high2'=> 'nullable|string',
            'Tumor_Type'=> 'nullable|string',
            'Distal_Margin'=> 'nullable|string',
            'Call_type'=> 'nullable|string',
            'Differetiatnion'=> 'nullable|string',
            'Lypmhatic'=> 'nullable|boolean',
            'Vascular'=> 'nullable|boolean',
            'Perineural'=> 'nullable|boolean',
            'Synchronous_Polypo'=> 'nullable|boolean',
            'Synchronous_cancer'=> 'nullable|boolean',
            'Cut_margin_condition'=> 'nullable|string',
            'LN_examed'=> 'nullable|string',
            'LN_involved'=> 'nullable|string',
            'Final_T'=> 'nullable|string',
            'Final_N'=> 'nullable|string',
            'Final_M'=> 'nullable|string',
            'Final_stage'=> 'nullable|string',
        ];
        $validator = Validator::make( $pathologyData, $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $chemotherapy = $formData['tracking']['Chemotherapy'];
        $chemotherapy['basic_information_id'] = $basicInfoData['Chart'];
        $rules=[
            'start_1'=> 'nullable|date', 'end_1'=> 'nullable|date',
            'start_2'=> 'nullable|date', 'end_2'=> 'nullable|date',
            'start_3'=> 'nullable|date', 'end_3'=> 'nullable|date',
            'start_4'=> 'nullable|date', 'end_4'=> 'nullable|date',
            'start_5'=> 'nullable|date', 'end_5'=> 'nullable|date',
            'start_6'=> 'nullable|date', 'end_6'=> 'nullable|date',
            'start_7'=> 'nullable|date', 'end_7'=> 'nullable|date',
            'start_8'=> 'nullable|date', 'end_8'=> 'nullable|date',
            'start_9'=> 'nullable|date', 'end_9'=> 'nullable|date',
            'start_10'=> 'nullable|date', 'end_10'=> 'nullable|date',
        ];
        $validator = Validator::make($chemotherapy, $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }


        // Adjuvant_Radiotherapy
        $Adjuvant_Radiotherapy = $formData['tracking']['Adjuvant_Radiotherapy'];
        $Adjuvant_Radiotherapy['basic_information_id'] = $basicInfoData['Chart'];
        $rules=[
            's_1'=> 'nullable|date', 'e_1'=> 'nullable|date', 'd_1'=> 'nullable|string',
            's_2'=> 'nullable|date', 'e_2'=> 'nullable|date', 'd_2'=> 'nullable|string',
            's_3'=> 'nullable|date', 'e_3'=> 'nullable|date', 'd_3'=> 'nullable|string',
            's_4'=> 'nullable|date', 'e_4'=> 'nullable|date', 'd_4'=> 'nullable|string',
            's_5'=> 'nullable|date', 'e_5'=> 'nullable|date', 'd_5'=> 'nullable|string',
            's_6'=> 'nullable|date', 'e_6'=> 'nullable|date', 'd_6'=> 'nullable|string',
            's_7'=> 'nullable|date', 'e_7'=> 'nullable|date', 'd_7'=> 'nullable|string',
            's_8'=> 'nullable|date', 'e_8'=> 'nullable|date', 'd_8'=> 'nullable|string',
            's_9'=> 'nullable|date', 'e_9'=> 'nullable|date', 'd_9'=> 'nullable|string',
            's_10'=> 'nullable|date','e_10'=> 'nullable|date', 'd_10'=> 'nullable|string',
        ];
        $validator = Validator::make($Adjuvant_Radiotherapy, $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // tumorMarker
        $tumorMarker = $formData['tracking']['Tumor_maker'];
        $tumorMarker['basic_information_id'] = $basicInfoData['Chart'];
        $rules=[
           'Td_1'=> 'nullable|date', 'TC_1'=> 'nullable|string', 'T125_1'=> 'nullable|string', 'T199_1'=> 'nullable|string', 'To_1'=> 'nullable|string',
            'Td_2'=> 'nullable|date', 'TC_2'=> 'nullable|string', 'T125_2'=> 'nullable|string', 'T199_2'=> 'nullable|string', 'To_2'=> 'nullable|string',
            'Td_3'=> 'nullable|date', 'TC_3'=> 'nullable|string', 'T125_3'=> 'nullable|string', 'T199_3'=> 'nullable|string', 'To_3'=> 'nullable|string',
            'Td_4'=> 'nullable|date', 'TC_4'=> 'nullable|string', 'T125_4'=> 'nullable|string', 'T199_4'=> 'nullable|string', 'To_4'=> 'nullable|string',
            'Td_5'=> 'nullable|date', 'TC_5'=> 'nullable|string', 'T125_5'=> 'nullable|string', 'T199_5'=> 'nullable|string', 'To_5'=> 'nullable|string',
            'Td_6'=> 'nullable|date', 'TC_6'=> 'nullable|string', 'T125_6'=> 'nullable|string', 'T199_6'=> 'nullable|string', 'To_6'=> 'nullable|string',
            'Td_7'=> 'nullable|date', 'TC_7'=> 'nullable|string', 'T125_7'=> 'nullable|string', 'T199_7'=> 'nullable|string', 'To_7'=> 'nullable|string',
            'Td_8'=> 'nullable|date', 'TC_8'=> 'nullable|string', 'T125_8'=> 'nullable|string', 'T199_8'=> 'nullable|string', 'To_8'=> 'nullable|string',
            'Td_9'=> 'nullable|date', 'TC_9'=> 'nullable|string', 'T125_9'=> 'nullable|string', 'T199_9'=> 'nullable|string', 'To_9'=> 'nullable|string',
            'Td_10'=> 'nullable|date', 'TC_10'=> 'nullable|string', 'T125_10'=> 'nullable|string', 'T199_10'=> 'nullable|string', 'To_10'=> 'nullable|string',
        ];
        $validator = Validator::make($tumorMarker, $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // colonoscopy
        $colonoscopy = $formData['tracking']['Colonoscopy'];
        $colonoscopy['basic_information_id'] = $basicInfoData['Chart'];
        $rules=[
           'ACt_1'=> 'nullable|date', 'ACF_1'=> 'nullable|string', 'ACPn_1'=> 'nullable|string', 'ACPs_1'=> 'nullable|string', 'ACo_1'=> 'nullable|string',
           'ACt_2'=> 'nullable|date', 'ACF_2'=> 'nullable|string', 'ACPn_2'=> 'nullable|string', 'ACPs_2'=> 'nullable|string', 'ACo_2'=> 'nullable|string',
           'ACt_3'=> 'nullable|date', 'ACF_3'=> 'nullable|string', 'ACPn_3'=> 'nullable|string', 'ACPs_3'=> 'nullable|string', 'ACo_3'=> 'nullable|string',
           'ACt_4'=> 'nullable|date', 'ACF_4'=> 'nullable|string', 'ACPn_4'=> 'nullable|string', 'ACPs_4'=> 'nullable|string', 'ACo_4'=> 'nullable|string',
           'ACt_5'=> 'nullable|date', 'ACF_5'=> 'nullable|string', 'ACPn_5'=> 'nullable|string', 'ACPs_5'=> 'nullable|string', 'ACo_5'=> 'nullable|string',
           'ACt_6'=> 'nullable|date', 'ACF_6'=> 'nullable|string', 'ACPn_6'=> 'nullable|string', 'ACPs_6'=> 'nullable|string', 'ACo_6'=> 'nullable|string',
           'ACt_7'=> 'nullable|date', 'ACF_7'=> 'nullable|string', 'ACPn_7'=> 'nullable|string', 'ACPs_7'=> 'nullable|string', 'ACo_7'=> 'nullable|string',
           'ACt_8'=> 'nullable|date', 'ACF_8'=> 'nullable|string', 'ACPn_8'=> 'nullable|string', 'ACPs_8'=> 'nullable|string', 'ACo_8'=> 'nullable|string',
           'ACt_9'=> 'nullable|date', 'ACF_9'=> 'nullable|string', 'ACPn_9'=> 'nullable|string', 'ACPs_9'=> 'nullable|string', 'ACo_9'=> 'nullable|string',
           'ACt_10'=> 'nullable|date', 'ACF_10'=> 'nullable|string', 'ACPn_10'=> 'nullable|string', 'ACPs_10'=> 'nullable|string', 'ACo_10'=> 'nullable|string',
        ];
        $validator = Validator::make($colonoscopy, $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // pet
        $pet = $formData['tracking']['PET'];
        $pet['basic_information_id'] = $basicInfoData['Chart'];
        $rules=[
            'PETt_1'=> 'nullable|date', 'PETf_1'=> 'nullable|string', 'PETo_1'=> 'nullable|string',
            'PETt_2'=> 'nullable|date', 'PETf_2'=> 'nullable|string', 'PETo_2'=> 'nullable|string',
            'PETt_3'=> 'nullable|date', 'PETf_3'=> 'nullable|string', 'PETo_3'=> 'nullable|string',
            'PETt_4'=> 'nullable|date', 'PETf_4'=> 'nullable|string', 'PETo_4'=> 'nullable|string',
            'PETt_5'=> 'nullable|date', 'PETf_5'=> 'nullable|string', 'PETo_5'=> 'nullable|string',
            'PETt_6'=> 'nullable|date', 'PETf_6'=> 'nullable|string', 'PETo_6'=> 'nullable|string',
            'PETt_7'=> 'nullable|date', 'PETf_7'=> 'nullable|string', 'PETo_7'=> 'nullable|string',
            'PETt_8'=> 'nullable|date', 'PETf_8'=> 'nullable|string', 'PETo_8'=> 'nullable|string',
            'PETt_9'=> 'nullable|date', 'PETf_9'=> 'nullable|string', 'PETo_9'=> 'nullable|string',
            'PETt_10'=> 'nullable|date', 'PETf_10'=> 'nullable|string', 'PETo_10'=> 'nullable|string',
        ];
        $validator = Validator::make($pet, $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        Basic_information::create($basicInfoData);
        Past_History::create($pastHistoryData);
        Initial_Symptoms::create($initialSymptomsData);
        Preoperative_Assessment::create($preoperativeAssessmentData);
        Preoperative_Treatment::create($preoperativeTreatmentData);
        CCRT::create($ccrtData);
        Surgery::create($surgeryData);
        Postoperative_Condition::create($postoperativeConditionData); 
        Pathology::create($pathologyData);
        Chemotherapy::create($chemotherapy);
        Adjuvant_Radiotherapy::create($Adjuvant_Radiotherapy);
        Tumor_maker::create($tumorMarker);
        Colonoscopy::create($colonoscopy);
        PET::create($pet);


        Action::create([
            'username' => $formData['username'],
            'action' => 'Create '. $basicInfoData['Chart'],
        ]);

    //     $trackingData = $formData['tracking'];
       

        return response()->json([
            'success' => true,
            'message' => '資料新增成功!',
        ]);
    }

    public function getData($id){
        $formInfo = Basic_information::with([
            'Past_History',
            'Initial_Symptoms',
            'Preoperative_Assessment',
            'Preoperative_Treatment',
            'CCRT',
            'Surgery',
            'Postoperative_Condition', 
            'Pathology',
            'Adjuvant_Radiotherapy',
            'Chemotherapy',
            'Colonoscopy',
            'PET',
            'Tumor_maker'
        ])->find($id);
    
        if ($formInfo) {
            //提取基本信息
            $basicInfo = $formInfo->only([
                'Chart', 'ID', 'Name', 'Birthday', 'Gender', 'Native', 'Dx', 
                'Visiting_staff', 'Operator', 'Source', 'HNPCC', 'FAP', 
                'Date_of_initial_diagnosis', 'Metastases', 'Date_of_metastases_noted', 
                'Time_of_last_follow', 'Date_of_mortality', 'Survival_time', 'DT_summary'
            ]);
            $tracking = [
                'Adjuvant_Radiotherapy' =>  $formInfo->Adjuvant_Radiotherapy->first(),
                'Chemotherapy' =>  $formInfo->Chemotherapy->first(),
                'Colonoscopy' =>  $formInfo->Colonoscopy->first(),
                'PET' =>  $formInfo->PET->first(),
                'Tumor_maker' =>  $formInfo->Tumor_maker->first(),

            ];
        
            return response()->json([
                'success' => true,
                'formInfo' => $formInfo,
                'basicInfo' => $basicInfo,
                'pastHistory' =>  $formInfo->Past_History->first(),
                'initialSymptoms' => $formInfo->Initial_Symptoms->first(),
                'preoperativeAssessment' => $formInfo->Preoperative_Assessment->first(),
                'preoperativeTreatment' => $formInfo->Preoperative_Treatment->first(),
                'ccrt' => $formInfo->CCRT->first(),
                'surgery' => $formInfo->Surgery->first(),
                'postoperativeCondition' =>  $formInfo->Postoperative_Condition->first(),
                'pathology' => $formInfo->Pathology->first(),
                'tracking' => $tracking
            ]);
        } 
        else {
            return response()->json([
                'success' => false,
                'message' => '查無此身分證！']);
        }
    }
    public function modify(Request $request){

    }
    public function getPatient(Request $request) {
        // 獲取所有病人的資料
        $patients = Basic_information::all(['Chart', 'ID', 'Name', 'creater', 'created_at']);
    
        // 檢查是否有資料
        if ($patients->isEmpty()) {
            return response()->json(['message' => 'No patients found'], 404);
        }
    
        // 返回 JSON 格式的資料
        return response()->json($patients);
    }
    

}
