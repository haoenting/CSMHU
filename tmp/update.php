<?php
    require_once('conn.php');
    
    session_start();
    $uid = $_SESSION['user_id'];
    $Chart = $_POST['Chart'];
    $tablesToDelete = array(
        "basic_information", "pass", "initial_symptoms", "preoperative_assessment", 
        "preoperative_treatment", "ccrt", "surgery", 
        "postoperative_condition", "pathology", "Chemotherapy",
        "Adjavent_radiotherapy", "tumor_marker", "Colonoscopy",
        "PET"
    );
    
    foreach ($tablesToDelete as $tableName) {
        $deleteSql = "DELETE FROM `$tableName` WHERE `Chart` = ?";
        $deleteStmt = mysqli_prepare($link, $deleteSql);
        mysqli_stmt_bind_param($deleteStmt, "s", $Chart);
        mysqli_stmt_execute($deleteStmt);
        mysqli_stmt_close($deleteStmt);
    }
    error_reporting(E_ERROR | E_PARSE);
   //basic_information
   
     $ID =  $_POST['ID'];
     $Name = $_POST['Name'];
     $Birthday = $_POST['Birthday'];
     $gender = $_POST['gender'];
     $Native = $_POST['Native'];
     $Dx = $_POST['Dx'];
     $Visiting_staff = $_POST['Visiting_staff'];
     $Operator = $_POST['Operator'];
     $Source = $_POST['Source'];
     $HNPCC = $_POST['HNPCC'];
     $FAP = $_POST['FAP'];
     $Date_of_initial_diagnosis = $_POST['Date_of_initial_diagnosis'];
     $Metastases = $_POST['Metastases'];
     $Date_of_metastases_noted = $_POST['Date_of_metastases_noted'];
     $Time_of_last_follow = $_POST['Time_of_last_follow'];
     $Date_of_mortality = $_POST['Date_of_mortality'];
     $Survival_time = $_POST['Survival_time'];
     $DT_summary = $_POST['DT_summary'];
     $Time = date('Y-m-d');
   
     $stmt = $link->prepare("INSERT INTO basic_information 
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
       
     $stmt->bind_param("issssssssssssssssssss", 
     $Chart, $ID, $Name, $Birthday, $gender, $Native, $Dx, $Visiting_staff,
     $Operator, $Source, $HNPCC, $FAP,  $Date_of_initial_diagnosis, $Metastases,
     $Date_of_metastases_noted, $Time_of_last_follow, $Date_of_mortality,
     $Survival_time, $DT_summary, $Time, $uid);
     $stmt->execute();
     $stmt->close();
   
   //pass
     $DM = $_POST['DM'];
     $HTM = $_POST['HTM'];
     $CVA = $_POST['CVA'];
     $CAD = $_POST['CAD'];
     $COPD = $_POST['COPD'];
     $CHF = $_POST['CHF'];
     $Liver_cirrhosis = $_POST['Liver_cirrhosis'];
     $Gout = $_POST['Gout'];
     $MD_other = $_POST['MD_other'];
     $Surgical_history = $_POST['Surgical_history'];
     $Smoking = $_POST['Smoking'];
     $Drinking = $_POST['Drinking'];
     $Betal_nut = $_POST['Betal_nut'];
     $Family_CRC_1 = $_POST['Family_CRC_1'];
     $Family_CRC_2 = $_POST['Family_CRC_2'];
     $Family_CRC_3 = $_POST['Family_CRC_3'];
     $Family_GI_cancer = $_POST['Family_GI_cancer'];
     $Family_other_cancer = $_POST['Family_other_cancer'];
    
     $stmt = $link->prepare("INSERT INTO pass 
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
       
     $stmt->bind_param("issssssssssssssssss",
     $Chart, $DM, $HTM, $CVA, $CAD, $COPD, $CHF, $Liver_cirrhosis, $Gout, 
     $MD_other, $Surgical_history, $Smoking, $Drinking, $Betal_nut, $Family_CRC_1,
     $Family_CRC_2, $Family_CRC_3, $Family_GI_cancer, $Family_other_cancer );
     $stmt->execute();
      $stmt->close();
   
   //initial symptoms
     $Stool_OB = $_POST['Stool_OB'];
     $Colonoscocopy = $_POST['Colonoscocopy'];
     $CEA1 = $_POST['CEA1'];
     $CT = $_POST['CT'];
     $MRI = $_POST['MRI'];
     $PET = $_POST['PET'];
     $Fresh_blood = $_POST['Fresh_blood'];
     $Bloody_stool = $_POST['Bloody_stool'];
     $Melanoma = $_POST['Melanoma'];
     $Small_caliber_of_stool = $_POST['Small_caliber_of_stool'];
     $Tenesmus = $_POST['Tenesmus'];
     $Constipation = $_POST['Constipation'];
     $Diarrhea = $_POST['Diarrhea'];
     $Mucus_passage = $_POST['Mucus_passage'];
     $Abdomen_pain = $_POST['Abdomen_pain'];
     $Abdomen_distention = $_POST['Abdomen_distention'];
     $Abdomen_fullness = $_POST['Abdomen_fullness'];
     $Abdomen_mass = $_POST['Abdomen_mass'];
     $Vomiting = $_POST['Vomiting'];
     $Loss_appetite = $_POST['Loss_appetite'];
     $Anemia = $_POST['Anemia'];
     $weight_loss = $_POST['weight_loss'];
     $Peritonitis = $_POST['Peritonitis'];
     $Distal_metastasis = $_POST['Distal_metastasis'];
     $Other_SS = $_POST['Other_SS'];
     $Duration_Initial_symptom = $_POST['Duration_Initial_symptom'];
   
     $stmt = $link->prepare("INSERT INTO initial_symptoms 
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
       
     $stmt->bind_param("issssssssssssssssssssssssss",
     $Chart, $Stool_OB, $Colonoscocopy, $CEA1, $CT, $MRI,
     $PET, $Fresh_blood, $Bloody_stool, $Melanoma,
     $Small_caliber_of_stool, $Tenesmus, $Constipation,
     $Diarrhea, $Mucus_passage, $Abdomen_pain, $Abdomen_distention, 
     $Abdomen_fullness, $Abdomen_mass, $Vomiting, $Loss_appetite,
     $Anemia, $weight_loss, $Peritonitis, $Distal_metastasis,
     $Other_SS, $Duration_Initial_symptom );
     $stmt->execute();
     
   
     if ($stmt->affected_rows <= 0) {
       echo "資料3語法執行失敗，錯誤訊息: " . $stmt->error;
     }
     $stmt->close();
   
   //preoperative assessment
     $Hemoglobin = $_POST['Hemoglobin'];
     $WBC = $_POST['WBC'];
     $Platelet = $_POST['Platelet'];
     $GOT = $_POST['GOT'];
     $GPT = $_POST['GPT'];
     $ALk = $_POST['ALk'];
     $BilT = $_POST['BilT'];
     $BilD = $_POST['BilD'];
     $Albumin = $_POST['Albumin'];
     $BUN = $_POST['BUN'];
     $Creatinine = $_POST['Creatinine'];
     $Na = $_POST['Na'];
     $K = $_POST['K'];
     $PT = $_POST['PT'];
     $APTT = $_POST['APTT'];
     $INR = $_POST['INR'];
     $CEA = $_POST['CEA'];
     $CA125 = $_POST['CA125'];
     $CA199 = $_POST['CA199'];
     $Other4_1 = $_POST['Other4_1'];
     $Stool_OB2 = $_POST['Stool_OB2'];
     $Bone_scan = $_POST['Bone_scan'];
     $MRI2 = $_POST['MRI2'];
     $PET_scan = $_POST['PET_scan'];
     $Scopy = $_POST['Scopy'];
     $Scopy_c = $_POST['Scopy_c'];
     $Up_to = $_POST['Up_to'];
     $Obstruction = $_POST['Obstruction'];
     $Tumor_location = $_POST['Tumor_location'];
     $Distence_from_AV = $_POST['Distence_from_AV'];
     $Polyps1 = $_POST['Polyps1'];
     $CXR = $_POST['CXR'];
     $Wall_thickening = $_POST['Wall_thickening'];
     $Involving_adjvcent_organ = $_POST['Involving_adjvcent_organ'];
     $LN_enlargement = $_POST['LN_enlargement'];
     $Liver_lodules = $_POST['Liver_lodules'];
     $Other4_2 = $_POST['Other4_2'];
     $Barium_enema = $_POST['Barium_enema'];
     $Polyps2 = $_POST['Polyps2'];
     $Abdominal_sonography = $_POST['Abdominal_sonography'];
     $Noudle_number = $_POST['Noudle_number'];
     $Other4_3 = $_POST['Other4_3'];
     $Other4_4 = $_POST['Other4_4'];
   
     $stmt = $link->prepare("INSERT INTO preoperative_assessment 
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
     
     $stmt->bind_param("isssssssssssssssssssssssssssssssssssssssssss",
     $Chart,$Hemoglobin, $WBC, $Platelet, $GOT, $GPT,
     $ALk, $BilT, $BilD, $Albumin, $BUN, $Creatinine,
     $Na, $K, $PT, $APTT, $INR, $CEA, $CA125, $CA199,
     $Other4_1, $Stool_OB2, $Bone_scan, $MRI2, $PET_scan, 
     $Scopy, $Scopy_c, $Up_to, $Obstruction, $Tumor_location, 
     $Distence_from_AV, $Polyps1, $CXR, $Wall_thickening,
     $Involving_adjvcent_organ, $LN_enlargement, $Liver_lodules,
     $Other4_2, $Barium_enema, $Polyps2, $Abdominal_sonography,
     $Noudle_number, $Other4_3, $Other4_4);
     $stmt->execute();
    
   
     if ($stmt->affected_rows <= 0) {
       echo "資料4語法執行失敗，錯誤訊息: " . $stmt->error;
     }
     $stmt->close();
   //preoperative treatment
     $Albumin2 = $_POST['Albumin2'];
     $PPN = $_POST['PPN'];
     $TPN = $_POST['TPN'];
     $days = $_POST['days'];
     $P_RBC = $_POST['P_RBC'];
     $Whole_blood = $_POST['Whole_blood'];
     $FFP = $_POST['FFP'];
     $Platelet = $_POST['Platelet'];
     $Colon_preparation_Type = $_POST['Colon_preparation_Type'];
     $Laxativs = $_POST['Laxativs'];
     $Oral_antibiotics = $_POST['Oral_antibiotics'];
     $Retention_enema = $_POST['Retention_enema'];
     $Cafazolin = $_POST['Cafazolin'];
     $Gentamicin = $_POST['Gentamicin'];
     $Metronidazole = $_POST['Metronidazole'];
     $Pre_OP_Other = $_POST['Pre_OP_Other'];
   
     $stmt = $link->prepare("INSERT INTO preoperative_treatment 
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
   
     $stmt->bind_param("isssiiiiissssssss",
     $Chart, $Albumin2,  $PPN, $TPN, $days, $P_RBC, $Whole_blood, $FFP, 
     $Platelet, $Colon_preparation_Type, $Laxativs, $Oral_antibiotics, $Retention_enema, 
     $Cafazolin, $Gentamicin, $Metronidazole, $Pre_OP_Other);
     $stmt->execute();
    
   
     if ($stmt->affected_rows <= 0) {
       echo "資料5語法執行失敗，錯誤訊息: " . $stmt->error;
     }
     $stmt->close();
   //ccrt
     $UFT = $_POST['UFT'];
     $Xeloda = $_POST['Xeloda'];
     $Neoadjavent_dose = $_POST['Neoadjavent_dose'];
     $Side_effect = $_POST['Side_effect'];
     $Time_to_surgery = $_POST['Time_to_surgery'];
   
     $stmt = $link->prepare("INSERT INTO ccrt 
     VALUES (?,?,?,?,?,?)");
   
     $stmt->bind_param("isssss",
     $Chart, $UFT, $Xeloda, $Neoadjavent_dose,  
     $Side_effect, $Time_to_surgery);
     $stmt->execute();
   
     if ($stmt->affected_rows <= 0) {
       echo "資料6語法執行失敗，錯誤訊息: " . $stmt->error;
     }$stmt->close();
   
   //surgery
     $Operatin_date = $_POST['Operatin_date'];
     $OP_method1 = $_POST['OP_method1'];
     $OP_method2 = $_POST['OP_method2'];
     $Extent_of_sugery = $_POST['Extent_of_sugery'];
     $Anesthesia_type = $_POST['Anesthesia_type'];
     $OP_time = $_POST['OP_time'];
     $Blood_loss = $_POST['Blood_loss'];
     $P_RBC2 = $_POST['P_RBC2'];
     $Whole_blood2 = $_POST['Whole_blood2'];
     $FFP2 = $_POST['FFP2'];
     $Platelet2 = $_POST['Platelet2'];
     $Type_of_incision = $_POST['Type_of_incision'];
     $Ascitis_color = $_POST['Ascitis_color'];
     $Synchronous_colonic_tumor_site = $_POST['Synchronous_colonic_tumor_site'];
     $Peritoneal_seeding = $_POST['Peritoneal_seeding'];
     $Tumor_site = $_POST['Tumor_site'];
     $Type_of_Anastomosis = $_POST['Type_of_Anastomosis'];
     $Anastomosis_to_anal_verge = $_POST['Anastomosis_to_anal_verge'];
     $Distal_distence = $_POST['Distal_distence'];
     $Tumor_long = $_POST['Tumor_long'];
     $Tumor_wide = $_POST['Tumor_wide'];
     $Tumor_High = $_POST['Tumor_High'];
     $Type_of_tumor = $_POST['Type_of_tumor'];
     $Perforation = $_POST['Perforation'];
     $Obstruction2 = $_POST['Obstruction2'];
     $Invasion_other = $_POST['Invasion_other'];
     $Combined_resection = $_POST['Combined_resection'];
     $Palpable_LNs = $_POST['Palpable_LNs'];
     $Liver_nodule = $_POST['Liver_nodule'];
     $Management = $_POST['Management'];
     $Protective_stoma = $_POST['Protective_stoma'];
     $Intracolonic = $_POST['Intracolonic'];
     $Reason_of_palliative_TX = $_POST['Reason_of_palliative_TX'];
   
     $stmt = $link->prepare("INSERT INTO surgery 
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
   
     $stmt->bind_param("issssssiiiiissssssssssssssssssssss",
     $Chart, $Operatin_date, $OP_method1, $OP_method2,
     $Extent_of_sugery, $Anesthesia_type, $OP_time, 
     $Blood_loss, $P_RBC2, $Whole_blood2, $FFP2, 
     $Platelet2, $Type_of_incision, $Ascitis_color,
     $Synchronous_colonic_tumor_site, $Peritoneal_seeding,
     $Tumor_site, $Type_of_Anastomosis, $Anastomosis_to_anal_verge,
     $Distal_distence, $Tumor_long, $Tumor_wide,
     $Tumor_High, $Type_of_tumor, $Perforation,$Obstruction2,
     $Invasion_other, $Combined_resection,$Palpable_LNs,
     $Liver_nodule, $Management, $Protective_stoma,
     $Intracolonic, $Reason_of_palliative_TX);
     $stmt->execute();
    
   
     if ($stmt->affected_rows <= 0) {
       echo "資料7語法執行失敗，錯誤訊息: " . $stmt->error;
     }
     $stmt->close();
   
   //postoperative condition
     $Cefazoline2 = $_POST['Cefazoline2'];
     $Gentamicin2 = $_POST['Gentamicin2'];
     $Metronidazole2 = $_POST['Metronidazole2'];
     $Antiobitics_other = $_POST['Antiobitics_other'];
     $DC4 = $_POST['DC4'];
     $NG = $_POST['NG'];
     $POD1 = $_POST['POD1'];
     $PCA = $_POST['PCA'];
     $POD2 = $_POST['POD2'];
     $Flatus = $_POST['Flatus'];
     $Defecation = $_POST['Defecation'];
     $Try_water = $_POST['Try_water'];
     $Soft_diet = $_POST['Soft_diet'];
     $Surgical = $_POST['Surgical'];
     $Medical = $_POST['Medical'];
     $Complication_other = $_POST['Complication_other'];
     $Length_of_hospitalization = $_POST['Length_of_hospitalization'];
     $Discharge = $_POST['Discharge'];
     $Re = $_POST['Re'];
     $Motality = $_POST['Motality'];
     
     $stmt = $link->prepare("INSERT INTO postoperative_condition 
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
   
     $stmt->bind_param("issssssssssssssssssss",
     $Chart, $Cefazoline2, $Gentamicin2,$Metronidazole2,
     $Antiobitics_other, $DC4, $NG, $POD1, 
     $PCA, $POD2, $Flatus, $Defecation, 
     $Try_water, $Soft_diet, $Surgical, $Medical,
     $Complication_other, $Length_of_hospitalization,
     $Discharge, $Re, $Motality);
     $stmt->execute();
   
     if ($stmt->affected_rows <= 0) {
       echo "資料8語法執行失敗，錯誤訊息: " . $stmt->error;
     }
      $stmt->close();
   
    //pathology
     $Tumor_long2 = $_POST['Tumor_long2'];
     $Tumor_wide2 = $_POST['Tumor_wide2'];
     $Tumor_high2 = $_POST['Tumor_high2'];
     $Tumor_Type = $_POST['Tumor_Type'];
     $Distal_Margin = $_POST['Distal_Margin'];
     $Call_type = $_POST['Call_type'];
     $Differetiatnion = $_POST['Differetiatnion'];
     $Lypmhatic = $_POST['Lypmhatic'];
     $Vascular = $_POST['Vascular'];
     $Perineural = $_POST['Perineural'];
     $Synchronous_Polypo = $_POST['Synchronous_Polypo'];
     $Synchronous_cancer = $_POST['Synchronous_cancer'];
     $Cut_margin_condition = $_POST['Cut_margin_condition'];
     $LN_examed = $_POST['LN_examed'];
     $LN_involved = $_POST['LN_involved'];
     $Final_T = $_POST['Final_T'];
     $Final_N = $_POST['Final_N'];
     $Final_M = $_POST['Final_M'];
     $Final_stage = $_POST['Final_stage'];
   
     $stmt = $link->prepare("INSERT INTO pathology 
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
   
     $stmt->bind_param("iiiissssssssssiiiiii",
     $Chart, $Tumor_long2, $Tumor_wide2, $Tumor_high2,
     $Tumor_Type, $Distal_Margin, $Call_type, $Differetiatnion, 
     $Lypmhatic, $Vascular, $Perineural, $Synchronous_Polypo,
     $Synchronous_cancer, $Cut_margin_condition, $LN_examed,
     $LN_involved,  $Final_T, $Final_N, $Final_M, $Final_stage);
     $stmt->execute();
   
   
     if ($stmt->affected_rows <= 0) {
       echo "資料9語法執行失敗，錯誤訊息: " . $stmt->error;
     }
     $stmt->close();
   
   //Chemotherapy
     $start1 = $_POST['start1'];
     $start2 = $_POST['start2'];
     $start3 = $_POST['start3'];
     $start4 = $_POST['start4'];
     $start5 = $_POST['start5'];
     $start6 = $_POST['start6'];
     $start7 = $_POST['start7'];
     $start8 = $_POST['start8'];
     $start9 = $_POST['start9'];
     $start10 = $_POST['start10'];
     $end1 = $_POST['end1'];
     $end2 = $_POST['end2'];
     $end3 = $_POST['end3'];
     $end4 = $_POST['end4'];
     $end5 = $_POST['end5'];
     $end6 = $_POST['end6'];
     $end7 = $_POST['end7'];
     $end8 = $_POST['end8'];
     $end9 = $_POST['end9'];
     $end10 = $_POST['end10'];
   
     $stmt = $link->prepare("INSERT INTO chemotherapy 
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
   
     $stmt->bind_param("issssssssssssssssssss",
     $Chart, $start1, $start2, $start3, $start4,
     $start5, $start6, $start7, $start8, $start9, $start10,
     $end1, $end2, $end3, $end4, $end5, $end6, $end7,
     $end8, $end9, $end10);
     $stmt->execute();
   
     if ($stmt->affected_rows <= 0) {
       echo "資料10語法執行失敗，錯誤訊息: " . $stmt->error;
     }
     $stmt->close();
   
     //Adjavent radiotherapy
     $s1 = $_POST["s1"];
     $e1 = $_POST["e1"];
     $d1 = $_POST["d1"];
     $s2 = $_POST["s2"];
     $e2 = $_POST["e2"];
     $d2 = $_POST["d2"];
     $s3 = $_POST["s3"];
     $e3 = $_POST["e3"];
     $d3 = $_POST["d3"];
     $s4 = $_POST["s4"];
     $e4 = $_POST["e4"];
     $d4 = $_POST["d4"];
     $s5 = $_POST["s5"];
     $e5 = $_POST["e5"];
     $d5 = $_POST["d5"];
     $s6 = $_POST["s6"];
     $e6 = $_POST["e6"];
     $d6 = $_POST["d6"];
     $s7 = $_POST["s7"];
     $e7 = $_POST["e7"];
     $d7 = $_POST["d7"];
     $s8 = $_POST["s8"];
     $e8 = $_POST["e8"];
     $d8 = $_POST["d8"];
     $s9 = $_POST["s9"];
     $e9 = $_POST["e9"];
     $d9 = $_POST["d9"];
     $s10 = $_POST["s"];
     $e10 = $_POST["e10"];
     $d10 = $_POST["d10"];
   
     $stmt = $link->prepare("INSERT INTO Adjavent_radiotherapy 
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
   
     $stmt->bind_param("ississississississississississi",
     $Chart, $s1, $e1, $d1,$s2, $e2, $d2,
     $s3, $e3, $d3, $s4, $e4, $d4,
     $s5, $e5, $d5, $s6, $e6, $d6,
     $s7, $e7, $d7, $s8, $e8, $d8,
     $s9, $e9, $d9, $s10, $e10, $d10);
     $stmt->execute();
   
   
     if ($stmt->affected_rows <= 0) {
       echo "資料11語法執行失敗，錯誤訊息: " . $stmt->error;
     } 
     $stmt->close();
   
     //Tumor marker
     $Td1 = $_POST['Td1'];
     $TC1 = $_POST['TC1'];
     $T1251 = $_POST['T1251'];
     $T1991 = $_POST['T1991'];
     $To1 = $_POST['To1'];
     $Td2 = $_POST['Td2'];
     $TC2 = $_POST['TC2'];
     $T1252 = $_POST['T1252'];
     $T1992 = $_POST['T1992'];
     $To2 = $_POST['To2'];
     $Td3 = $_POST['Td3'];
     $TC3 = $_POST['TC3'];
     $T1253 = $_POST['T1253'];
     $T1993 = $_POST['T1993'];
     $To3 = $_POST['To3'];
     $Td4 = $_POST['Td4'];
     $TC4 = $_POST['TC4'];
     $T1254 = $_POST['T1254'];
     $T1994 = $_POST['T1994'];
     $To4 = $_POST['To4'];
     $Td5 = $_POST['Td5'];
     $TC5 = $_POST['TC5'];
     $T1255 = $_POST['T1255'];
     $T1995 = $_POST['T1995'];
     $To5 = $_POST['To5'];
     $Td6 = $_POST['Td6'];
     $TC6 = $_POST['TC6'];
     $T1256 = $_POST['T1256'];
     $T1996 = $_POST['T1996'];
     $To6 = $_POST['To6'];
     $Td7 = $_POST['Td7'];
     $TC7 = $_POST['TC7'];
     $T1257 = $_POST['T1257'];
     $T1997 = $_POST['T1997'];
     $To7 = $_POST['To7'];
     $Td8 = $_POST['Td8'];
     $TC8= $_POST['TC8'];
     $T1258 = $_POST['T1258'];
     $T1998 = $_POST['T1998'];
     $To8 = $_POST['To8'];
     $Td9 = $_POST['Td9'];
     $TC9 = $_POST['TC9'];
     $T1259 = $_POST['T1259'];
     $T1999 = $_POST['T1999'];
     $To9 = $_POST['To9'];
     $Td0 = $_POST['Td0'];
     $TC0 = $_POST['TC0'];
     $T1250 = $_POST['T1250'];
     $T1990 = $_POST['T1990'];
     $To0 = $_POST['To0'];
   
     $stmt = $link->prepare("INSERT INTO tumor_marker 
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
   
     $stmt->bind_param("issssssssssssssssssssssssssssssssssssssssssssssssss",
     $Chart,$Td1, $TC1, $T1251, $T1991, $To1,
     $Td2, $TC2, $T1252, $T1992, $To2, 
     $Td3, $TC3, $T1253, $T1993, $To3, 
     $Td4, $TC4, $T1254, $T1994, $To4, 
     $Td5, $TC5, $T1255, $T1995, $To5,
     $Td6, $TC6, $T1256, $T1996, $To6, 
     $Td7, $TC7, $T1257, $T1997, $To7, 
     $Td8, $TC8, $T1258, $T1998, $To8, 
     $Td9, $TC9, $T1259, $T1999, $To9, 
     $Td0, $TC0, $T1250, $T1990, $To0);
     $stmt->execute();
   
   
     if ($stmt->affected_rows <= 0) {
       echo "資料12語法執行失敗，錯誤訊息: " . $stmt->error;
     }
     $stmt->close();
   
     //Colonoscopy
     $ACt1 = $POST['ACt1'];
     $ACF1 = $POST['ACF1'];
     $ACPn1 = $POST['ACPn1'];
     $ACPs1 = $POST['ACPs1'];
     $ACo1 = $POST['ACo1'];
     $ACt2 = $POST['ACt2'];
     $ACF2 = $POST['ACF2'];
     $ACPn2 = $POST['ACPn2'];
     $ACPs2 = $POST['ACPs2'];
     $ACo2 = $POST['ACo2'];
     $ACt3 = $POST['ACt3'];
     $ACF3 = $POST['ACF3'];
     $ACPn3 = $POST['ACPn3'];
     $ACPs3 = $POST['ACPs3'];
     $ACo3 = $POST['ACo3'];
     $ACt4 = $POST['ACt4'];
     $ACF4 = $POST['ACF4'];
     $ACPn4 = $POST['ACPn4'];
     $ACPs4 = $POST['ACPs4'];
     $ACo4 = $POST['ACo4'];
     $ACt5 = $POST['ACt5'];
     $ACF5 = $POST['ACF5'];
     $ACPn5 = $POST['ACPn5'];
     $ACPs5 = $POST['ACPs5'];
     $ACo5 = $POST['ACo5'];
     $ACt6 = $POST['ACt6'];
     $ACF6 = $POST['ACF6'];
     $ACPn6 = $POST['ACPn6'];
     $ACPs6 = $POST['ACPs6'];
     $ACo6 = $POST['ACo6'];
     $ACt7 = $POST['ACt7'];
     $ACF7 = $POST['ACF7'];
     $ACPn7 = $POST['ACPn7'];
     $ACPs7 = $POST['ACPs7'];
     $ACo7 = $POST['ACo7'];
     $ACt8 = $POST['ACt8'];
     $ACF8 = $POST['ACF8'];
     $ACPn8 = $POST['ACPn8'];
     $ACPs8 = $POST['ACPs8'];
     $ACo8 = $POST['ACo8'];
     $ACt9 = $POST['ACt9'];
     $ACF9 = $POST['ACF9'];
     $ACPn9 = $POST['ACPn9'];
     $ACPs9 = $POST['ACPs9'];
     $ACo9 = $POST['ACo9'];
     $ACt0 = $POST['ACt0'];
     $ACF0 = $POST['ACF0'];
     $ACPn0 = $POST['ACPn0'];
     $ACPs0 = $POST['ACPs0'];
     $ACo0 = $POST['ACo0'];
   
     $stmt = $link->prepare("INSERT INTO Colonoscopy 
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
   
     $stmt->bind_param("issssssssssssssssssssssssssssssssssssssssssssssssss",
     $Chart,$ACt1, $ACF1, $ACPn1, $ACPs1, $ACo1,
     $ACt2, $ACF2, $ACPn2, $ACPs2, $ACo2, 
     $ACt3, $ACF3, $ACPn3, $ACPs3, $ACo3, 
     $ACt4, $ACF4, $ACPn4, $ACPs4, $ACo4, 
     $ACt5, $ACF5, $ACPn5, $ACPs5, $ACo5,
     $ACt6, $ACF6, $ACPn6, $ACPs6, $ACo6, 
     $ACt7, $ACF7, $ACPn7, $ACPs7, $ACo7, 
     $ACt8, $ACF8, $ACPn8, $ACPs8, $ACo8, 
     $ACt9, $ACF9, $ACPn9, $ACPs9, $ACo9, 
     $ACt0, $ACF0, $ACPn0, $ACPs0, $ACo0);
     $stmt->execute();
   
   
     if ($stmt->affected_rows <= 0) {
       echo "資料13語法執行失敗，錯誤訊息: " . $stmt->error;
     }
     $stmt->close();
     //PET
     $PETt1 = $POST['PETt1'];$PETf1 = $POST['PETf1'];$PETo1 = $POST['PETo1'];
     $PETt2 = $POST['PETt2'];$PETf2 = $POST['PETf2'];$PETo2 = $POST['PETo2'];
     $PETt3 = $POST['PETt3'];$PETf3 = $POST['PETf3'];$PETo3 = $POST['PETo3'];
     $PETt4 = $POST['PETt4'];$PETf4 = $POST['PETf4'];$PETo4 = $POST['PETo4'];
     $PETt5 = $POST['PETt5'];$PETf5 = $POST['PETf5'];$PETo5 = $POST['PETo5'];
     $PETt6 = $POST['PETt6'];$PETf6 = $POST['PETf6'];$PETo6 = $POST['PETo6'];
     $PETt7 = $POST['PETt7'];$PETf7 = $POST['PETf7'];$PETo7 = $POST['PETo7'];
     $PETt8 = $POST['PETt8'];$PETf8 = $POST['PETf8'];$PETo8 = $POST['PETo8'];
     $PETt9 = $POST['PETt9'];$PETf9 = $POST['PETf9'];$PETo9 = $POST['PETo9'];
     $PETt0 = $POST['PETt0'];$PETf0 = $POST['PETf0'];$PETo0 = $POST['PETo0'];
   
   
     $stmt = $link->prepare("INSERT INTO PET 
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
   
     $stmt->bind_param("issssssssssssssssssssssssssssss",
     $Chart, $PETt1, $PETf1, $PETo1,
     $PETt2, $PETf2, $PETo2, 
     $PETt3, $PETf3, $PETo3, 
     $PETt4, $PETf4, $PETo4, 
     $PETt5, $PETf5, $PETo5, 
     $PETt6, $PETf6, $PETo6, 
     $PETt7, $PETf7, $PETo7, 
     $PETt8, $PETf8, $PETo8, 
     $PETt9, $PETf9, $PETo9, 
     $PETt0, $PETf0, $PETo0);
     $stmt->execute();
   
     if ($stmt->affected_rows <= 0) {
       echo "資料14語法執行失敗，錯誤訊息: " . $stmt->error;
     }
     $stmt->close();
   
     $current_time = date("Y-m-d H:i:s");
     $insert_query = "INSERT INTO `action` VALUES ('$current_time', '$uid', 'modify $Chart')";
     mysqli_query($link, $insert_query);
   
     mysqli_close($link);
     echo "<script>
     alert('資料新增成功!');
     window.close()
     </script>";
?>