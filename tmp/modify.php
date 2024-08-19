<?php 
  require_once('conn.php');

  $Chart = $_POST["Chart"];

  $tables = array(
    "basic_information", "pass", "initial_symptoms", "preoperative_assessment", 
    "preoperative_treatment", "ccrt", "surgery", 
    "postoperative_condition", "pathology", "Chemotherapy",
    "Adjavent_radiotherapy", "tumor_marker", "Colonoscopy",
    "PET"
  );

  $stmt = mysqli_prepare($link, "SELECT * FROM basic_information WHERE Chart = ?");
  mysqli_stmt_bind_param($stmt, "i", $Chart);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row_count = mysqli_num_rows($result); // 获取行数

  if ($row_count) {
    $rowData = array();

    foreach ($tables as $table) {
        $stmt = mysqli_prepare($link, "SELECT * FROM $table WHERE Chart = ?");
        mysqli_stmt_bind_param($stmt, "i", $Chart);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rowData[$table] = mysqli_fetch_assoc($result);
    }
    $row1 = $rowData['basic_information'];
    $row2 = $rowData['pass'];
    $row3 = $rowData['initial_symptoms']; 
    $row4 = $rowData['preoperative_assessment']; 
    $row5 = $rowData['preoperative_treatment']; 
    $row6 = $rowData['ccrt']; 
    $row7 = $rowData['surgery']; 
    $row8 = $rowData['postoperative_condition']; 
    $row9 = $rowData['pathology']; 
    $row10 = $rowData['Chemotherapy'];
    $row11 = $rowData['Adjavent_radiotherapy']; 
    $row12 = $rowData['tumor_marker']; 
    $row13 = $rowData['Colonoscopy']; 
    $row14 = $rowData['PET']; 
    mysqli_stmt_close($stmt);
  } 
  else {
    echo "<script>
    alert('資料不存在。');
    window.location = 'catalog.php';
    </script>";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset = "UTF-8"></meta>
    <title>CSMUH CRS Cancer Database</title>
    <link rel="stylesheet" href="styles.css" />
    <script src="script.js"></script>
    <style>
        table {
        border: 3px #cccccc solid;
        text-align: left;
        width: 1150px;
        height: 500px;
        margin: 0 auto;
      }
      .main-table {
        width: 1350px;
        height: 600px;
        text-align: center;
        margin: 0 auto;
      }
      .second-table {
        width: 1150px;
        height: 500px;
        text-align: center;
        margin: 0 auto;
      }
      .container span {
        margin-right: 15px;
      }
      .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
    </style>
  </head>

  <body>
    <h1>CSMUH CRS Cancer Database</h1>
    <hr/>
    <form method="POST" action="update.php" >
    <div style="float:right;">
      <input type="submit" value="儲存紀錄">
    </div>
   
    <table class="main-table" cellpadding="10" border="1">
      <tr>
        <th id='th1' onclick="isHidden1('div1'); changeColor('th1')" width="10%">基本資料</th>
        <th id='th2' onclick="isHidden1('div2'); changeColor('th2')"width="10%">過去病史</th>
        <th id='th3' onclick="isHidden1('div3'); changeColor('th3')"width="10%">初始症狀</th>
        <th id='th4' onclick="isHidden1('div4'); changeColor('th4')"width="10%">術前評估</th>
        <th id='th5' onclick="isHidden1('div5'); changeColor('th5')"width="10%">術前處置</th>
        <th id='th6' onclick="isHidden1('div6'); changeColor('th6')"width="10%">CCRT</th>
        <th id='th7' onclick="isHidden1('div7'); changeColor('th7')"width="10%">手術</th>
        <th id='th8' onclick="isHidden1('div8'); changeColor('th8')"width="10%">術後狀況</th>
        <th id='th9' onclick="isHidden1('div9'); changeColor('th9')"width="10%">病理</th>
        <th id='th10' onclick="isHidden1('div10'); changeColor('th10')" width="10%">追加追蹤</th>
      </tr>

      
        <td colspan="10" >
          <!--基本資料 basic-->
          <div id="div1" style="display:block">
            <table  cellpadding="10" border="1" >
              <tr>
                <td valign="top">
                  <div class="container">
                    <span>Chart No :</span>
                    <input type="text" size="10" name="Chart" autocomplete="off" required value="<?php echo $row1['Chart']; ?>">
                  </div><br/>
                    
                  <div class="container">
                    <span>ID No :</span>
                    <input type="text" size="10" name="ID" autocomplete="off" value="<?php echo $row1['ID']; ?>">
                  </div><br/>
      
                  <div class="container">
                    <span>Name :</span>
                    <input type="text" size="10" name="Name" autocomplete="off" value="<?php echo $row1['Name']; ?>">
                  </div><br/>
                  
                  <div class="container">
                    <span>Birthday :</span>
                    <input type="date" name="Birthday" value="<?php echo $row1['Birthday']; ?>">
                  </div><br/>
                  
                  <span>Gender :</span>
                  <input type="radio" name="Gender" value="Male" <?php echo ($row1['Gender'] === 'Male') ? 'checked' : ''; ?>>
                  <label for="male">Male</label>

                  <input type="radio" name="Gender" value="Female" <?php echo ($row1['Gender']  === 'Female') ? 'checked' : ''; ?>>
                  <label for="female">Female</label>
                  <br/><br/>

                  <div class="container">
                    <span>Native :</span>
                    <input list="city" name="Native" type="text" size="15" value="<?php echo $row1['Native']; ?>">
                      <datalist id="city">
                      <select>
                        <option value="Taiwan">
                        <option value="PRC">
                        <option value="Hakka">
                        <option value="Original">
                        <option value="Aboreginal">
                      </select>
                      </datalist>
                  </div>
                </td>
      
                <td valign="top">
                  <div class="container">
                    <span>Dx :</span> 
                    <input list="Dx" name="Dx" type="text" size="10"  value="<?php echo $row1['Dx']; ?>">
                    <datalist id="Dx">
                      <select>
                      <option value="Appendix">Appendix</option>
                        <option value="Cecum">Cecum</option>
                        <option value="A-colon">A-colon</option>
                        <option value="Hepatic fluxure">Hepatic fluxure</option>
                        <option value="Right T-colon">Right T-colon</option>
                        <option value="Mid T-colon">Mid T-colon</option>
                        <option value="Left T-colon">Left T-colon</option>
                        <option value="Splenic flexure">Splenic flexure</option>
                        <option value="D-colon">D-colon</option>
                        <option value="DS junction">DS junction</option>
                        <option value="S-colon">S-colon</option>
                        <option value="RS junction">RS junction</option>
                        <option value="Upper rectum">Upper rectum</option>
                        <option value="Middle rectum">Middle rectum</option>
                        <option value="Lower rectum">Lower rectum</option>
                        <option value="Anal canal">Anal canal</option>
                        <option value="Anus">Anus</option>
                        <option value="2-site">2-site</option>
                      </select>
                    </datalist>
                  </div><br/>
      
                  <div class="container">
                    <span>Visiting staff : </span>
                    <input type="text" size="10" name="Visiting_staff" value="<?php echo $row1['Visiting_staff']; ?>">
                  </div><br/>
      
                  <div class="container">
                    <span>Operator : </span> 
                    <input type="text" size="10" name="Operator" value="<?php echo $row1['Operator']; ?>">
                  </div><br/>
      
                  <div class="container">
                    <span>Source :</span>
                    <input list="Source" name="Source" type="text" size="10" autocomplete="off" value="<?php echo $row1['Source']; ?>">
                    <datalist id="Source">
                      <select>
                        <option value="OPD">
                        <option value="Other hospital">
                        <option value="Concolution">
                        <option value="ER">
                      </select>
                    </datalist>
                  </div><br/>
                  
                  <input type="checkbox" name="HNPCC" value="yes" <?php echo ($row1['HNPCC']) ? 'checked' : ''; ?> >
                  <span>HNPCC</span><br/>
                  <input type="checkbox" name="FAP" value="yes" <?php echo ($row1['FAP']) ? 'checked' : ''; ?>>
                  <span>FAP</span>
                </td>
      
                <td valign="top">
                  <div class="container">
                    <span>Date of initial diagnosis : </span>
                    <input type="date" name="Date_of_initial_diagnosis"  value="<?php echo $row1['Date_of_initial_diagnosis']; ?>">
                  </div>

                  <input type="checkbox" name="Metastases" value="yes" <?php echo ($row1['Metastases']) ? 'checked' : ''; ?>>
                  <span>Metastases</span>
                  
                  <div class="container">
                    <span>Date of metastases noted :</span>
                    <input type="date" name="Date_of_metastases_noted" value="<?php echo $row1['Date_of_metastases_noted']; ?>">
                  </div><br/>
      
                  <div class="container">
                    <span>Time of last follow-up :</span>
                    <input type="date" name="Time_of_last_follow" value="<?php echo $row1['Time_of_last_follow']; ?>">
                  </div><br/>
      
                  <div class="container">
                    <span>Date of mortality :</span> 
                    <input type="date" name="Date_of_mortality" value="<?php echo $row1['Date_of_mortality']; ?>">
                  </div> <br/>
      
                  <div class="container">
                    <span>Survival time (M) :</span> 
                    <input type="text" size="10" name="Survival_time"  value="<?php echo $row1['Survival_time']; ?>">
                  </div>
                </td>
              </tr>

              <tr>
                <td colspan="3"style="text-align: center">
                  <span>Dx/Tx summary :</span> 
                  <textarea name="DT_summary" cols="60" rows="8"  style="vertical-align: middle;"><?php echo $row1['Dx/Tx_summary']; ?>
                  </textarea>
                </td>
              </tr>
            </table>
          </div>

          <!--過去病史 pass-->
          <div id="div2" style="display:none">
            <table cellpadding="10" border="1">
              <td valign="top">
                <u>Medical history</u><br/>
                <input type="checkbox" name="DM" value="yes" <?php echo ($row2['DM']) ? 'checked' : ''; ?>>DM<br/>
                <input type="checkbox" name="HTM" value="yes" <?php echo ($row2['HTM']) ? 'checked' : ''; ?>>HTM<br/>
                <input type="checkbox" name="CVA" value="yes" <?php echo ($row2['CVA']) ? 'checked' : ''; ?>>CVA</span><br/>
                <input type="checkbox" name="CAD" value="yes" <?php echo ($row2['CAD']) ? 'checked' : ''; ?>>CAD<br/>
                <input type="checkbox" name="COPD" value="yes" <?php echo ($row2['COPD']) ? 'checked' : ''; ?>>COPD<br/>
                <input type="checkbox" name="CHF" value="yes" <?php echo ($row2['CHF']) ? 'checked' : ''; ?>>CHF<br/>
                <input type="checkbox" name="Liver_cirrhosis" value="yes" <?php echo ($row2['Liver_cirrhosis']) ? 'checked' : ''; ?>>Liver cirrhosis<br/>
                <input type="checkbox" name="Gout" value="yes" <?php echo ($row2['Gout']) ? 'checked' : ''; ?>>Gout<br/>
                <span>Others : </span>
                <input type="text" name="MD_other" value="<?php echo $row2['MD_other']; ?>">
              </td>
    
              <td valign="top">
                <u>Surgical history</u><br/>
                <textarea name="Surgical_history" cols="40" rows="4"><?php echo $row2['Surgical_history']; ?></textarea>
                <br/><br/>
    
                <u>Personal Hx</u><br/>
                <div class="container">
                  <span>Smoking : </span>
                  <input list="Smoking" type="text" name="Smoking" size="10" value="<?php echo $row2['Smoking']; ?>">
                  <datalist id="Smoking" >
                    <select name="Smoking">
                      <option value="None">
                      <option value="1-10">
                      <option value="11-20">
                      <option value="Heavy">
                    </select>
                  </datalist>
                </div><br/>

                <div class="container">
                  <span>Drinking :</span> 
                  <input list="Drinking" type="text" name="Drinking" size="10" value="<?php echo $row2['Drinking']; ?>">
                  <datalist id="Drinking" >
                    <select>
                      <option value="None">
                      <option value="Social">
                      <option value="Chronic">
                    </select>
                  </datalist>
                </div>
                <br/>
                <div class="container">
                <span>Betal nut chewing :</span> 
                <input list="Betal_nut" type="text" name="Betal_nut" size="10" value="<?php echo $row2['Betal_nut']; ?>">
                <datalist id="Betal_nut">
                  <select>
                    <option value="None">
                    <option value="Social">
                    <option value="Chronic">
                  </select>
                </datalist> 
                </div>
              </td>
              
              <td valign="top">
                <u>Family Hx of CRC</u><br/>
                <input type="checkbox" name="Family_CRC_1" value="yes" <?php echo ($row2['Family_CRC_1']) ? 'checked' : ''; ?>>
                <span>1 st degree</span><br/>
                <input type="checkbox" name="Family_CRC_2" value="yes" <?php echo ($row2['Family_CRC_2']) ? 'checked' : ''; ?>>
                <span>2 nd degree</span><br/>
                <input type="checkbox" name="Family_CRC_3" value="yes" <?php echo ($row2['Family_CRC_3']) ? 'checked' : ''; ?>>
                <span>3 rd degree</span><br/>
                <br/>

                <u>Family Hx of other cancer</u><br/>
                <input type="checkbox" name="Family_GI_cancer" value="yes" <?php echo ($row2['Family_GI_cancer']) ? 'checked' : ''; ?>>
                <span>GI cancer</span>
                <br/>
                <span>Other cancer : </span><br/>
                <textarea name="Family_other_cancer" ><?php echo $row2['Family_other_cancer']; ?></textarea>
              </td>
            </table>
          </div>

          <!--初始症狀-->
          <div id="div3" style="display:none">
            <table cellpadding="10" border="1">
              <tr>
                <td valign="top">
                  <u>Asymptomatic</u><br/>
                  <input type="checkbox" name="Stool_OB" value="yes" <?php echo ($row3['Stool_OB']) ? 'checked' : ''; ?>>Stool OB<br/>
                  <input type="checkbox" name="Colonoscocopy" value="yes" <?php echo ($row3['Colonoscocopy']) ? 'checked' : ''; ?>>Colonoscocopy<br/>
                  <input type="checkbox" name="CEA" value="yes" <?php echo ($row3['CEA']) ? 'checked' : ''; ?>>CEA<br/>
                  <input type="checkbox" name="CT" value="yes" <?php echo ($row3['CT']) ? 'checked' : ''; ?>>CT<br/>
                  <input type="checkbox" name="MRI" value="yes" <?php echo ($row3['MRI']) ? 'checked' : ''; ?>>MRI<br/>
                  <input type="checkbox" name="PET" value="yes" <?php echo ($row3['PET']) ? 'checked' : ''; ?>>PET<br/>
                  <br/><br />

                  <u>Blood passage from anv</u><br/>
                  <input type="checkbox" name="Fresh_blood" value="yes" <?php echo ($row3['Fresh_blood']) ? 'checked' : ''; ?>>Fresh blood<br/>
                  <input type="checkbox" name="Bloody_stool" value="yes" <?php echo ($row3['Bloody_stool']) ? 'checked' : ''; ?>>Bloody stool<br/>
                  <input type="checkbox" name="Melanoma" value="yes" <?php echo ($row3['Melanoma']) ? 'checked' : ''; ?>>Melanoma<br/>
                </td>
                
                <td valign="top">
                  <u>Changing in bowel habit</u><br/>
                  <input type="checkbox" name="Small_caliber_of_stool" value="yes" <?php echo ($row3['Small_caliber_of_stool']) ? 'checked' : ''; ?>>Small caliber of stool<br/>
                  <input type="checkbox" name="Tenesmus" value="yes" <?php echo ($row3['Tenesmus']) ? 'checked' : ''; ?>>Tenesmus<br/>
                  <input type="checkbox" name="Constipation" value="yes" <?php echo ($row3['Constipation']) ? 'checked' : ''; ?>>Constipation<br/>
                  <input type="checkbox" name="Diarrhea" value="yes" <?php echo ($row3['Diarrhea']) ? 'checked' : ''; ?>>Diarrhea<br/>
                  <input type="checkbox" name="Mucus_passage" value="yes" <?php echo ($row3['Mucus_passage']) ? 'checked' : ''; ?>>Mucus passage<br/>
                  <br/><br />

                  <u>Abdomen discomfor</u><br/>
                  <input type="checkbox" name="Abdomen_pain" value="yes" <?php echo ($row3['Abdomen_pain']) ? 'checked' : ''; ?>>Abdomen pain<br/>
                  <input type="checkbox" name="Abdomen_distention" value="yes" <?php echo ($row3['Abdomen_distention']) ? 'checked' : ''; ?>>Abdomen distention<br/>
                  <input type="checkbox" name="Abdomen_fullness" value="yes" <?php echo ($row3['Abdomen_fullness']) ? 'checked' : ''; ?>>Abdomen fullness<br/>
                  <input type="checkbox" name="Abdomen_mass" value="yes" <?php echo ($row3['Abdomen_mass']) ? 'checked' : ''; ?>>Abdomen mass<br/>
                </td>

                <td valign="top">
                  <u>Generalized condition change</u><br/>
                  <input type="checkbox" name="Vomiting" value="yes" <?php echo ($row3['Vomiting']) ? 'checked' : ''; ?>>Vomiting<br/>
                  <input type="checkbox" name="Loss_appetite" value="yes" <?php echo ($row3['Loss_appetite']) ? 'checked' : ''; ?>>Loss appetite<br/>
                  <input type="checkbox" name="Anemia" value="yes" <?php echo ($row3['Anemia']) ? 'checked' : ''; ?>>Anemia<br/>
                  Body weight loss : <input type="text" name="weight_loss" size="1" value="<?php echo $row3['weight_loss']; ?>"> KG<br/>
                  <br/>

                  <input type="checkbox" name="Peritonitis" value="yes" <?php echo ($row3['Peritonitis']) ? 'checked' : ''; ?>>
                  <u>Peritonitis</u>
                  <br/><br/>

                  <u>Distal metastasis : </u><br/>
                  <textarea name="Distal_metastasis" cols="20" rows="3"><?php echo $row3['Distal_metastasis'];?></textarea>
                  <br/>

                  <u>Other S/S:</u><br/>
                  <textarea name="Other_SS" cols="20" rows="3"><?php echo $row3['Other_SS']; ?></textarea>

                </td>
              </tr>

              <tr>
                <td colspan="3" align="center">
                  <u>Duration of Initial symptom</u>:
                  <input type="text" name="Duration_Initial_symptom" value="<?php echo $row3['Duration_Initial_symptom']; ?>">
                </td>
              </tr>
            </table>
          </div>

          <!--術前評估-->
          <div id="div4" style="display:none">
            <table cellpadding="10" border="1">
              <tr>
                <td valign="top">
                  <u>CBC</u><br />
                  <div class="container">
                    <span>Hemoglobin :</span> 
                    <input type="text" name="Hemoglobin" size="5" value="<?php echo $row4['Hemoglobin']; ?>">
                  </div>
                  
                  <div class="container">
                    <span>WBC :</span>
                    <input type="text" name="WBC" size="5" value="<?php echo $row4['WBC']; ?>">
                  </div>
                    
                  <div class="container">
                    <span>Platelet(k) :</span>
                    <input type="text" name="Platelet" size="5" value="<?php echo $row4['Platelet(k)']; ?>">
                  </div>
                  <br/>
      

                  <u>Liver function</u><br />
                  <div class="container">
                    <span>GOT :</span>
                    <input type="text" name="GOT" size="5" value="<?php echo $row4['GOT']; ?>">
                  </div>
                
                  <div class="container">
                    <span>GPT :</span>
                    <input type="text" name="GPT" size="5" value="<?php echo $row4['GPT']; ?>">
                  </div>

                  <div class="container">
                    <span>ALk-P :</span>
                    <input type="text" name="ALK" size="5" value="<?php echo $row4['ALk-P']; ?>">
                  </div>

                  <div class="container">
                    <span>Bil-T :</span>
                    <input type="text" name="BilT" size="5" value="<?php echo $row4['Bil-T']; ?>">
                  </div>

                  <div class="container">
                    <span>Bil-D :</span>
                    <input type="text" name="BilD" size="5" value="<?php echo $row4['Bil-D']; ?>">
                  </div>

                  <div class="container">
                    <span>Albumin :</span>
                    <input type="text" name="Albumin" size="5" value="<?php echo $row4['Albumin']; ?>">
                  </div>
                  <br/>


                  <u>Renal Function/electrolyte</u><br/>
                  <div class="container">
                    <span>BUN :</span>
                    <input type="text" name="BUN" size="5" value="<?php echo $row4['BUN']; ?>">
                  </div>
                
                  <div class="container">
                    <span>Creatinine :</span> 
                    <input type="text" name="Creatinine" size="5" value="<?php echo $row4['Creatinine']; ?>">
                  </div>

                  <div class="container">
                    <span>Na+ :</span>
                    <input type="text" name="Na" size="5" value="<?php echo $row4['Na+']; ?>">
                  </div>

                  <div class="container">
                    <span>K+ :</span>
                    <input type="text" name="K" size="5" value="<?php echo $row4['K+']; ?>">
                  </div>
                </td>

                <td valign="top">
                  <u>Caugulation profile</u><br/>
                  <div class="container">
                    <span>PT :</span>
                    <input type="text" name="PT" size="5" value="<?php echo $row4['PT']; ?>">
                  </div>

                  <div class="container">
                    <span>APTT :</span>
                    <input type="text" name="APTT" size="5" value="<?php echo $row4['APTT']; ?>">
                  </div>

                  <div class="container">
                    <span>INR:</span>
                    <input type="text" name="INR" size="5" value="<?php echo $row4['INR']; ?>">
                  </div><br/>

                  <u>Tumor marker</u><br/>
                  <div class="container">
                    <span>CEA :</span>
                    <input type="text" name="CEA" size="5" value="<?php echo $row4['CEA']; ?>">
                  </div>
                  
                  <div class="container">
                    <span> CA-125 :</span>
                    <input type="text" name="CA125" size="5" value="<?php echo $row4['CA-125']; ?>">
                  </div>

                  <div class="container">
                    <span>CA-199 :</span>
                    <input type="text" name="CA199" size="5" value="<?php echo $row4['CA-199']; ?>">
                  </div>

                  <div class="container">
                    <span>Other :</span>
                    <textarea  name="Other4_1"><?php echo $row4['Other(Tumor marker)']; ?></textarea>
                  </div><br/>

                  <div class="container">
                    <u>Stool OB :</u>
                    <input list="Stool_OB2" name="Stool_OB2" type="text" size="15" value="<?php echo $row4['Stool_OB']; ?>">
                      <datalist id="Stool_OB2">
                        <select>
                          <option value="None" >None</option>
                          <option value="Positive">Positive</option>
                          <option value="Negative">Negative</option>
                      </select>
                      </datalist>
                  </div>

                  <div class="container">
                    <u>Bone scan :</u>
                    <input list="Bone_scan" name="Bone_scan" type="text" size="15" value="<?php echo $row4['Bone_scan']; ?>">
                      <datalist id="Bone_scan">
                        <select>
                          <option value="None">None</option>
                          <option value="Positive">Positive</option>
                          <option value="Negative">Negative</option>
                        </select>
                      </datalist>
                  </div><br/>

                  <input type="checkbox" name="MRI2" value="yes" <?php echo ($row4['MRI']) ? 'checked' : ''; ?>>MRI<br/><br/>

                  <div class="container">
                    <u>PET scan :</u>
                    <input list="PET_scan" name="PET_scan" type="text" size="15" value="<?php echo $row4['PET_scan']; ?>">
                      <datalist id="PET_scan">
                        <select>
                          <option value="None">None</option>
                          <option value="Positive">Positive</option>
                          <option value="Negative">Negative</option>
                        </select>
                      </datalist>
                  </div>
                </td>

                <td valign="top">
                  <div class="container">
                    <u>Scopy : </u>
                    <input list="Scopy" name="Scopy" type="text" size="15" value="<?php echo $row4['Scopy']; ?>">
                    <datalist id="Scopy">
                      <select>
                        <option value=""></option>
                        <option value="Colono scopy">Colono scopy</option>
                        <option value="Sigmoid scopy">Sigmoid scopy</option>
                      </select>
                    </datalist>
                  </div>

                  <input type="radio" name="Scopy_c" value="Complete" <?php echo ($row4['Scopy_c'] === 'Complete') ? 'checked' : ''; ?>>Complete<br/>
                  <input type="radio" name="Scopy_c" value="Incomplete" <?php echo ($row4['Scopy_c'] === 'Incomplete') ? 'checked' : ''; ?>>Incomplete
                  <div style="float:right;">
                    Up to : 
                    <input type="text" name="Up_to" size="3" value="<?php echo $row4['Up_to']; ?>"> CM
                  </div><br/><br/>

                  <div class="container">
                    <span>Obstruction :</span> 
                    <input list="Obstruction" name="Obstruction" type="text" size="15" value="<?php echo $row4['Obstruction']; ?>">
                    <datalist id="Obstruction">
                      <select>
                      <option value="None">None</option>
                      <option value="Partial">Partial</option>
                      <option value="Total">Total</option>
                    </select>
                    </datalist>
                  </div>

                  <div class="container">
                    Tumor location : 
                    <input list="Tumor_location" name="Tumor_location" type="text" size="10" value="<?php echo $row4['Tumor_location']?>">
                    <datalist id="Tumor_location">
                      <select>
                        <option value="Appendix">Appendix</option>
                        <option value="Cecum">Cecum</option>
                        <option value="A-colon">A-colon</option>
                        <option value="Hepatic fluxure">Hepatic fluxure</option>
                        <option value="Right T-colon">Right T-colon</option>
                        <option value="Mid T-colon">Mid T-colon</option>
                        <option value="Left T-colon">Left T-colon</option>
                        <option value="Splenic flexure">Splenic flexure</option>
                        <option value="D-colon">D-colon</option>
                        <option value="DS junction">DS junction</option>
                        <option value="S-colon">S-colon</option>
                        <option value="RS junction">RS junction</option>
                        <option value="Upper rectum">Upper rectum</option>
                        <option value="Middle rectum">Middle rectum</option>
                        <option value="Lower rectum">Lower rectum</option>
                        <option value="Anal canal">Anal canal</option>
                        <option value="Anus">Anus</option>
                        <option value="2-site">2-site</option>
                      </select>
                    </datalist>
                  </div>
                  
                  <span>Distence from AV :</span> 
                  <div style="float:right;">
                    <input type="text" name="Distence_from_AV" size="3" value="<?php echo $row4['Distence_from_AV']; ?>"> CM
                  </div><br/><br/>

                  <input type="checkbox" name="Polyps1" value="yes" <?php echo ($row4['Polyps1']) ? 'checked' : ''; ?>>Polyps<br/>
                  <br/>

                  <u>Radiology</u><br/>
                  <div class="container">
                    <span>CXR</span>
                    <input list="CXR" name="CXR" type="text" size="10" value="<?php echo $row4['CXR']?>">
                    <datalist id="CXR">
                      <select>
                        <option value="No">No</option>
                        <option value="WNL">WNL</option>
                        <option value="Nodule">Nodule</option>
                      </select>
                    </datalist>
                  </div><br/>

                  <u>Abdominal CT</u><br/>
                  <input type="checkbox" value="yes" name="Wall_thickening" <?php echo ($row4['Wall_thickening']) ? 'checked' : ''; ?>>
                  <span>Wall thickening</span>
                  <br/>
                  <input type="checkbox" value="yes" name="Involving_adjvcent_organ" <?php echo ($row4['Involving_adjvcent_organ']) ? 'checked' : ''; ?>>
                  <span>Involving adjvcent organ</span>
                  <br/>
                  <input type="checkbox"value="yes" name="LN_enlargement" <?php echo ($row4['LN_enlargement']) ? 'checked' : ''; ?>>
                  <span>LN enlargement</span>
                  <br/>
                  <input type="checkbox"value="yes" name="Liver_lodules" <?php echo ($row4['Liver_lodules']) ? 'checked' : ''; ?>>
                  <span>Liver lodules</span>
                  <br/>
                  <span>Other : </span>
                  <input type="text" name="Other4_2" size="10" value="<?php echo $row4['Other(Abdominal_CT)'] ?> ">
                </td>

                <td valign="top">
                  <div class="container">
                    <span>Barium enema</span>
                    <input list="Barium_enema" name="Barium_enema" type="text" size="10" value="<?php echo $row4['Barium_enema']?>">
                    <datalist id="Barium_enema">
                      <select>
                      <option value="Nil">Nil</option>
                      <option value="No finding">No finding</option>
                      <option value="Tumor detect">Tumor detect</option>
                    </select>
                    </datalist>
                  </div>

                  <input type="checkbox" name="Polyps2" value="yes"  <?php echo ($row4['Polyps2']) ? 'checked' : ''; ?>>Polyps
                  <br/><br/>

                  <div class="container">
                    <span>Abdominal sonography</span>
                    <input list="Abdominal_sonography" name="Abdominal_sonography" type="text" size="10" value="<?php echo $row4['Abdominal_sonography']?>">
                    <datalist id="Abdominal_sonography">
                      <select>
                      <option value="No" >No</option>
                      <option value="WNL">WNL</option>
                      <option value="Nodule">Nodule</option>
                    </select>
                    </datalist>
                  </div>

                  <div class="container">
                    <span>Nodule number : </span> 
                    <input type="text" name="Noudle_number" size="5" value="<?php echo $row4['Noudle_number']; ?>">
                  </div>
                  <br/>

                  <div class="container">
                    <span>Others(1) :</span> 
                    <textarea name="Other4_3"><?php echo $row4['Other(Nodule_number1)']; ?></textarea>
                  </div><br/>
                
                  <div class="container">
                    <span>Others(2) : </span>
                    <textarea name="Other4_4"><?php echo $row4['Other(Nodule_number2)']; ?></textarea>
                  </div>
                </td>
              </tr>
            </table>
          </div>

          <div id="div5" style="display:none">
            <table cellpadding="10" border="1">
              <tr>
                <td valign="top">
                  <u>Nutrition support</u><br/>
                  <input type="checkbox" name="Albumin2" value="yes" <?php echo ($row5['Albumin']) ? 'checked' : ''; ?>>
                  <span>Albumin</span><br/>
                  <input type="checkbox" name="PPN" value="yes" <?php echo ($row5['PPN']) ? 'checked' : ''; ?>>
                  <span>PPN</span><br/>
                  <input type="checkbox" name="TPN" value="yes" <?php echo ($row5['TPN']) ? 'checked' : ''; ?>>
                  <span>TPN</span><br/>
                  <span>days : </span> 
                  <input type="text" name="days" size="3" value="<?php echo $row5['days']?>"><br/><br/>

                  <u>Blood transfusion</u><br/>
                  <div class="container">
                    <span>P-RBC :</span> 
                    <input list="P_RBC" name="P_RBC" type="text" size="10" value="<?php echo $row5['P-RBC']?>">
                    <datalist id="P_RBC">
                      <select>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value=">6">>6</option>
                    </select>  
                    </datalist>
                  </div>

                  <div class="container">
                    <span>Whole blood :</span>
                    <input list="Whole_blood" name="Whole_blood" type="text" size="10" value="<?php echo $row5['Whole_blood']?>">
                    <datalist id="Whole_blood">
                      <select>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value=">4">>4</option>
                      </select>
                    </datalist>
                  </div>

                  <div class="container">
                    <span>FFP :</span>
                      <input list="FFP" name="FFP" type="text" size="10" value="<?php echo $row5['FFP']?>">
                      <datalist id="FFP">
                        <select>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value=">6">>6</option>
                      </select>
                      </datalist>
                  </div>

                  <div class="container">
                    <span>Platelet :</span> 
                    <input type="text" name="Platelet" size="8" value="<?php echo $row5['Platelet']; ?>">
                  </div>
                </td>
                
                <td valign="top">
                  <u>Colon preparation</u><br/>
                  <div class="container">
                    <span>Type : </span>
                    <input list="Colon_preparation_Type" name="Colon_preparation_Type" type="text" size="15" value="<?php echo $row5['Colon_preparation_Type']; ?>">
                    <datalist id="Colon_preparation_Type">
                      <select>
                      <option value="One day prepare">
                        <option value="Two day prepare">
                        <option value="Three day prepare">
                      </select>
                    </datalist>
                  </div>
                  
                  <div class="container">
                    <span>Laxativs :</span>
                    <input list="Laxativs" name="Laxativs" type="text" size="15" value="<?php echo $row5['Laxativs']; ?>">
                    <datalist id="Laxativs">
                      <select>
                      <option value="None">None</option>
                      <option value="Klean Prep power">Klean Prep power</option>
                      <option value="Phosphosoda">Phosphosoda</option>
                      <option value="Dulcolax">Dulcolax</option>
                      <option value="Caster Oil">Caster Oil</option>
                    </select>
                    </datalist>
                  </div>

                  <input type="checkbox" name="Oral_antibiotics" value="yes" <?php echo ($row5['Oral_antibiotics']) ? 'checked' : ''; ?>>
                  <span>Oral antibiotics</span>
                  <br/>
                  <input type="checkbox" name="Retention_enema" value="yes" <?php echo ($row5['Retention_enema']) ? 'checked' : ''; ?>>
                  <span>Retention enema</span>
                  <br/><br/>
                  
                  <u>Pre-OP Antibiotics</u><br/>
                  <input type="checkbox" name="Cafazolin" value="yes" <?php echo ($row5['Cafazolin']) ? 'checked' : ''; ?>>
                  <span>Cafazolin (1 g)</span>
                  <br/>
                  <input type="checkbox" name="Gentamicin" value="yes" <?php echo ($row5['Gentamicin']) ? 'checked' : ''; ?>>
                  <span>Gentamicin (80 mg)</span>
                  <br/>
                  <input type="checkbox" name="Metronidazole" value="yes" <?php echo ($row5['Metronidazole']) ? 'checked' : ''; ?>>
                  <span>Metronidazole (500 mg)</span>
                  <br/>
                  <div class="container">
                    <span>Other :</span>
                    <textarea name="Pre_OP_Other"><?php echo $row5['Other']?></textarea> 
                  </div>
                </td>
              </tr>
            </table>
          </div>

          <!--CCRT-->
          <div id="div6" style="display:none">
            <table cellpadding="10" border="1">
              <td valign="top">
                <u>Neoadjavent C/T</u><br/>
                <input type="checkbox" name="UFT" value="yes" <?php echo ($row6['UFT']) ? 'checked' : ''; ?>>
                <span>UFT</span><br/>
                <input type="checkbox" name="Xeloda" value="yes" <?php echo ($row6['Xeloda']) ? 'checked' : ''; ?>>
                <span>Xeloda</span><br/>
                <br/>

                <u>Neoadjavent R/T</u><br/>
                <span>Total dose (Gy) : </span>
                <input type="date" name="Neoadjavent_dose" value="<?php echo $row6['Neoadjavent_dose']?>"><br/>
                <br/>

                <span>Side effect : </span> 
                <input type="text" name="Side_effect" size="13" value="<?php echo $row6['Side_effect']?>"><br/>
                <br/>

                <span>Time to surgery(wks) : </span>
                <input list="Time_to_surgery" name="Time_to_surgery" type="text" size="15" value="<?php echo $row6['Time_to_surgery(wks)']; ?>">
                <datalist id="Time_to_surgery">
                  <select>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value=">8">>8</option>
                  </select>
                </datalist>
              </td>
            </table>
          </div>

          <!--手術-->
          <div id="div7" style="display:none">
            <table cellpadding="10" border="1">
              <tr >
                <td >
                  <div class="container">
                    <u>Operatin date : </u>
                    <input type="date" name="Operatin_date" value="<?php echo $row7['Operatin_date']?>"> 
                  </div>
                </td>
                <td colspan="2">
                  <div class="container">
                    <u>OP method : </u>
                    <input list="OP_method1" name="OP_method1" type="text" size="15" value="<?php echo $row7['OP_method(1)']; ?>">
                    <datalist id="OP_method1">
                      <select>
                        <option value="Scope">Scope</option>
                        <option value="Open">Open</option>
                        <option value="Scope to open">Scope to open</option>
                      </select>
                    </datalist>
                  </div>

                  <div style="float:right;">
                    <input list="OP_method2" name="OP_method2" type="text" size="15" value="<?php echo $row7['OP_method(2)']; ?>">
                    <datalist id="OP_method2">
                      <select>
                        <option value="Hartmanns procedure">Hartmanns procedure</option>
                        <option value="APR">APR</option>
                        <option value="CAA(staple)">CAA(staple)</option>
                        <option value="CAA(hand sewing)">CAA(hand sewing)</option>
                        <option value="LAR">LAR</option>
                        <option value="AR">AR</option>
                        <option value="Left colectomy">Left colectomy</option>
                        <option value="T-colectomy">T-colectomy</option>
                        <option value="Extended right hemicolectomy">Extended right hemicolectomy</option>
                        <option value="Right hemicolectomy">Right hemicolectomy</option>
                        <option value="Limited right hemicolectomy">Limited right hemicolectomy</option>
                        <option value="Total colectomy with IRA">Total colectomy with IRA</option>
                        <option value="Total proctocolectomy with ileostomy">Total proctocolectomy with ileostomy</option>
                        <option value="Total proctocolectomy with pouch">Total proctocolectomy with pouch</option>
                        <option value="Diversion">Diversion</option>
                        <option value="Bypass">Bypass</option>
                      </select>
                    </datalist>
                  </div>
                </td>
              </tr>

              <tr>
                <td valign="top">
                  <div class="container">
                    <span>Extent of surgery :</span>
                    <input list="Extent_of_sugery" name="Extent_of_sugery" type="text" size="15" value="<?php echo $row7['Extent_of_sugery']; ?>">
                    <datalist id="Extent_of_sugery">
                      <select>
                        <option value="Curative">Curative</option>
                        <option value="Palliative">Palliative</option>
                        <option value="Uncertain">Uncertain</option>
                      </select>
                    </datalist>
                  </div>

                  <div class="container">
                    <span>Anesthesia type :</span> 
                    <input list="Anesthesia_type" name="Anesthesia_type" type="text" size="15" value="<?php echo $row7['Anesthesia_type']; ?>">
                    <datalist id="Anesthesia_type">
                      <select>
                        <option value="GA">GA</option>
                        <option value="SA">SA</option>
                        <option value="EA">EA</option>
                        <option value="IVG">IVG</option>
                        <option value="LA">LA</option>
                      </select>
                    </datalist>
                  </div>

                  <div class="container">
                    <span>OP time(min) : </span>
                  <input type="text" name="OP_time" size="5" value="<?php echo $row7['OP_time(min)']; ?>">
                  </div>

                  <div class="container">
                    <span>Blood loss(cc) :</span>
                    <input type="text" name="Blood_loss" size="5" value="<?php echo $row7['Blood_loss(cc)']; ?>">
                  </div><br/>

                  <u>Blood transfusion</u><br/>
                  <div class="container">
                    <span>P-RBC :</span>
                    <input type="text" name="P_RBC2" size="5" value="<?php echo $row7['P-RBC']; ?>">
                  </div>

                  <div class="container">
                    <span>Whole blood :</span>
                    <input type="text" name="Whole_blood2" size="5" value="<?php echo $row7['Whole_blood']; ?>">
                  </div>

                  <div class="container">
                    <span>FFP :</span>
                    <input type="text" name="FFP2" size="5" value="<?php echo $row7['FFP']; ?>">
                  </div>

                  <div class="container">
                    <span>Platelet :</span>
                    <input type="text" name="Platelet2" size="5" value="<?php echo $row7['Platelet']; ?>">
                  </div><br/>

                  <div class="container">
                    <u>Type of incision :</u>
                    <input list="Type_of_incision" name="Type_of_incision" type="text" size="15" value="<?php echo $row7['Type_of_incision']; ?>">
                    <datalist id="Type_of_incision">
                      <select>
                        <option value="Lower midline">Lower midline</option>
                        <option value="Upper midline">Upper midline</option>
                        <option value="Transverse">Transverse</option>
                        <option value="RUQ oblique">RUQ oblique</option>
                        <option value="LLQ oblique">LLQ oblique</option>
                        <option value="Laparoscopy">Laparoscopy</option>
                        <option value="Long midline">Long midline</option>
                      </select>
                    </datalist>
                  </div>

                  <div class="container">
                    <span>Ascitis color : </span>
                    <input list="Ascitis_color" name="Ascitis_color" type="text" size="15" value="<?php echo $row7['Ascitis_color']; ?>">
                    <datalist id="Ascitis_color">
                      <select>
                        <option value="None">None</option>
                        <option value="Clear">Clear</option>
                        <option value="Turbid">Turbid</option>
                      </select>
                    </datalist>
                  </div>

                  <div class="container">
                    <span>Synchronous colonic tumor site :</span>
                    <input list="Synchronous_colonic_tumor_site" name="Synchronous_colonic_tumor_site" type="text" size="15" value="<?php echo $row7['Synchronous_colonic_tumor_site']; ?>">
                    <datalist id="Synchronous_colonic_tumor_site">
                      <select>
                        <option value="Appendix">Appendix</option>
                        <option value="Cecum">Cecum</option>
                        <option value="A-colon">A-colon</option>
                        <option value="Hepatic fluxure">Hepatic fluxure</option>
                        <option value="Right T-colon">Right T-colon</option>
                        <option value="Mid T-colon">Mid T-colon</option>
                        <option value="Left T-colon">Left T-colon</option>
                        <option value="Splenic flexure">Splenic flexure</option>
                        <option value="D-colon">D-colon</option>
                        <option value="DS junction">DS junction</option>
                        <option value="S-colon">S-colon</option>
                        <option value="RS junction">RS junction</option>
                        <option value="Upper rectum">Upper rectum</option>
                        <option value="Middle rectum">Middle rectum</option>
                        <option value="Lower rectum">Lower rectum</option>
                        <option value="Anal canal">Anal canal</option>
                        <option value="Anus">Anus</option>
                        <option value="2-site">2-site</option>
                      </select>
                    </datalist>
                  </div>

                  <input type="checkbox" name="Peritoneal_seeding" value="yes" <?php echo ($row7['Peritoneal_seeding']) ? 'checked' : ''; ?>>
                  <span>Peritoneal seeding</span>
                </td>

                <td valign="top">
                  <div class="container">
                    <u>Tumor site : </u>
                    <input list="Tumor_site" name="Tumor_site" type="text" size="10" value="<?php echo $row7['Tumor_site'] ; ?>">
                    <datalist id="Tumor_site">
                      <select>
                        <option value="Appendix">Appendix</option>
                        <option value="Cecum">Cecum</option>
                        <option value="A-colon">A-colon</option>
                        <option value="Hepatic fluxure">Hepatic fluxure</option>
                        <option value="Right T-colon">Right T-colon</option>
                        <option value="Mid T-colon">Mid T-colon</option>
                        <option value="Left T-colon">Left T-colon</option>
                        <option value="Splenic flexure">Splenic flexure</option>
                        <option value="D-colon">D-colon</option>
                        <option value="DS junction">DS junction</option>
                        <option value="S-colon">S-colon</option>
                        <option value="RS junction">RS junction</option>
                        <option value="Upper rectum">Upper rectum</option>
                        <option value="Middle rectum">Middle rectum</option>
                        <option value="Lower rectum">Lower rectum</option>
                        <option value="Anal canal">Anal canal</option>
                        <option value="Anus">Anus</option>
                        <option value="2-site">2-site</option>
                      </select>
                  </div>

                  <div class="container">
                    <span>Type of anastomosis :</span>
                    <input list="Type_of_Anastomosis" name="Type_of_Anastomosis" type="text" size="10" value="<?php echo $row7['Type_of_Anastomosis']; ?>">
                    <datalist id="Type_of_Anastomosis">
                      <select>
                      <option value="Stapled">Stapled</option>
                      <option value="Hand-sewing">Hand-sewing</option>
                      <option value="None">None</option>
                    </select>
                    </datalist>
                  </div>
                  
                  <div class="container">
                    <span>Anastomosis to anal verge :</span>
                    <input type="text" name="Anastomosis_to_anal_verge" size="5" value="<?php echo $row7['Anastomosis_to_anal_verge'] ; ?>">
                  </div>

                  <div class="container">
                    <span>Distal distence (cm) :</span>
                    <input type="text" name="Distal_distence" size="5" value="<?php echo $row7['Distal_distence(cm)'] ; ?>">
                  </div><br/>

                  <u>Tumor size</u><br/>
                  <div class="container">
                    <span>Long :</span>
                    <input type="text" name="Tumor_long" size="5" value="<?php echo $row7['Tumor_size(long)'] ; ?>">
                  </div>

                  <div class="container">
                    <span>Wide :</span>
                    <input type="text" name="Tumor_wide" size="5" value="<?php echo $row7['Tumor_size(wide)'] ; ?>">
                  </div>

                  <div class="container">
                    <span>High :</span>
                    <input type="text" name="Tumor_High" size="5" value="<?php echo $row7['Tumor_size(High)'] ; ?>">
                  </div><br/>

                  <div class="container">
                    <u>Type of tumor : </u>
                    <input list="Type_of_tumor" name="Type_of_tumor" type="text" size="10" value="<?php echo $row7['Type_of_tumor']; ?>">
                    <datalist id="Type_of_tumor">
                      <select>
                      <option value="Ulcrative">Ulcrative</option>
                      <option value="Polypoid">Polypoid</option>
                      <option value="Annular">Annular</option>
                      <option value="other">other</option>
                    </select>
                    </datalist>
                  </div>

                  <input type="checkbox" name="Perforation" value="yes" <?php echo ($row7['Perforation']) ? 'checked' : ''; ?>>Perforation<br/>
                  <input type="checkbox" name="Obstruction2" value="yes" <?php echo ($row7['Obstruction']) ? 'checked' : ''; ?>>Obstruction
                </td>

                <td valign="top">
                  <u>Invasion to other structure :</u><br/>
                  <textarea name="Invasion_other" cols="30" rows="3"><?php echo $row7['Invasion_other']; ?></textarea>
                  <br/>
                  <input type="checkbox" name="Combined_resection" value="yes" <?php echo ($row7['Combined_resection']) ? 'checked' : ''; ?>>
                  <span>Combined resection</span>
                  <br/><br/>

                  <div class="container">
                    <u>Palpable LNs : </u>
                    <input list="Palpable_LNs" name="Palpable_LNs" type="text" size="10" value="<?php echo $row7['Palpable_LNs']; ?>">
                    <datalist id="Palpable_LNs">
                      <select>
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                      <option value="Uncertain">Uncertain</option>
                    </select>
                    </datalist>
                  </div>

                  <div class="container">
                    <u>Liver nodule : </u>
                    <input list="Liver_nodule" name="Liver_nodule" type="text" size="10" value="<?php echo $row7['Liver_nodule']; ?>">
                    <datalist id="Liver_nodule">
                      <select>
                      <option value="None">None</option>
                      <option value="Right lobe single">Right lobe single</option>
                      <option value="Right lobe multiple">Right lobe multiple</option>
                      <option value="Left lobe single">Left lobe single</option>
                      <option value="Left lobe multiple">Left lobe multiple</option>
                      <option value="Bilateral">Bilateral</option>
                    </select>
                    </datalist>
                  </div>

                  <div class="container">
                    <span>Management :</span>
                    <input list="Management" name="Management" type="text" size="10" value="<?php echo $row7['Management']; ?>">
                    <datalist id="Management">
                      <select>
                        <option value=""></option>
                        <option value="None">None</option>
                        <option value="BX">BX</option>
                        <option value="Resection">Resection</option>
                      </select>
                    </datalist>
                  </div><br/>
                  
                  <div class="container">
                    <u>Protective stoma :</u>
                    <input list="Protective_stoma" name="Protective_stoma" type="text" size="10" value="<?php echo $row7['Protective_stoma']; ?>">
                    <datalist id="Protective_stoma">
                      <select>
                        <option value="No">No</option>
                        <option value="Ileostomy">Ileostomy</option>
                        <option value="Colostomy">Colostomy</option>
                      </select>
                    </datalist>
                  </div>

                  <input type="checkbox" name="Intracolonic" value="yes" <?php echo ($row7['Intracolonic']) ? 'checked' : ''; ?>>Intracolonic irrigation
                  <br/><br/>

                  <u>Reason of palliative TX : </u><br/>
                  <textarea name="Reason_of_palliative_TX" cols="30" rows="3"><?php echo $row7['Reason_of_palliative_TX']; ?></textarea>
                </td>
              </tr>
            </table>
          </div>

          <!--術後-->
          <div id="div8" style="display:none">
            <table cellpadding="10" border="1">
              <td valign="top">
                <u>Antiobitics</u><br/>
                <div class="container">
                   <span>Cefazoline</span>
                   <span>
                    DC on POD (1) : 
                    <input type="text" name="Cefazoline2" size="5" value="<?php echo $row8['Cefazoline'] ; ?>">
                  </span>
                </div><br/>
                
                <div class="container">
                  <span>Gentamicin</span>
                  <span>
                    DC on POD (2) :
                    <input type="text" name="Gentamicin2" size="5" value="<?php echo $row8['Gentamicin'] ; ?>">
                  </span>
                  </div><br/>

                <div class="container">
                  <span>Metronidazole</span>
                  <span>
                    DC on POD (3) :
                    <input type="text" name="Metronidazole2" size="5" value="<?php echo $row8['Metronidazole'] ; ?>">
                  </span>
                  </div><br/>
                
                <div class="container">
                  <span>
                    Others : 
                    <input type="text" name="Antiobitics_other" size="5" value="<?php echo $row8['Antiobitics_other'] ; ?>">
                  </span>
                  <span>
                    DC on POD (4) :
                    <input type="text" name="DC4" size="5" value="<?php echo $row8['Other'] ; ?>">
                  </span>
                </div><br/><br/>

                <div class="container">
                  <span>NG :</span>
                  <input list="NG" name="NG" type="text" size="10" value="<?php echo $row8['NG']; ?>">
                  <datalist id="NG">
                    <select>
                      <option value="None">None</option>
                      <option value="Free drain">Free drain</option>
                      <option value="Decompression">Decompression</option>
                    </select>
                  </datalist>
                </div>

                <div style="float:right;">
                  <span>Removed on POD (1) :</span>
                  <input type="text" name="POD1" size="5" value="<?php echo $row8['Removed_on_POD(1)'] ; ?>">
                </div><br/><br/>

                <div class="container">
                  <span>PCA :</span> 
                  <input list="PCA" name="PCA" type="text" size="10" value="<?php echo $row8['PCA']; ?>">
                  <datalist id="PCA">
                    <select>
                      <option value="None">None</option>
                      <option value="Epidura">Epidura</option>
                      <option value="IV">IV</option>
                    </select>
                  </datalist>
                </div>

                <div style="float:right;">
                  <span>Removed on POD (2) :</span>
                  <input type="text" name="POD2" size="5" value="<?php echo $row8['Removed_on_POD(2)'] ; ?>">
                </div>
              </td>

              <td valign="top">
                <div class="container">
                  <span>Flatus on POD :</span> 
                  <input type="text" name="Flatus" size="5" value="<?php echo $row8['Flatus'] ; ?>">
                </div>

                <div class="container">
                  <span>Defecation on POD :</span>
                  <input type="text" name="Defecation" size="5" value="<?php echo $row8['Defecation'] ; ?>">
                </div>

                <div class="container">
                  <span>Try water on POD :</span>
                  <input type="text" name="Try_water" size="5" value="<?php echo $row8['Try_water'] ; ?>">
                </div>

                <div class="container">
                  <span>Soft diet on POD :</span>
                  <input type="text" name="Soft_diet" size="5" value="<?php echo $row8['Soft_diet'] ; ?>">
                </div><br/>

                <u>Complication</u><br/>
                <div class="container">
                  <span>Surgical :</span>
                  <input list="Surgical" name="Surgical" type="text" size="10" value="<?php echo $row8['Surgical']; ?>">
                  <datalist id="Surgical">
                    <select>
                      <option value="None">None</option>
                      <option value="Wound infection">Wound infection</option>
                      <option value="Leakage">Leakage</option>
                      <option value="Intrabdominal bbscess">Intraabdominal bbscess</option>
                      <option value="Hemonrrhage">Hemonrrhage</option>
                      <option value="Intestinal obstruction">Intestinal obstruction</option>
                    </select>
                  </datalist>
                </div>

                <div class="container">
                  <span>Medical :</span>
                  <input list="Medical" name="Medical" type="text" size="10" value="<?php echo $row8['Medical']; ?>">
                  <datalist id="Medical">
                    <select>
                      <option value="None">None</option>
                      <option value="Proloned ileus">Proloned ileus</option>
                      <option value="Pneumonia">Pneumonia</option>
                      <option value="CVA">CVA</option>
                      <option value="MI">MI</option>
                      <option value="UTI">UTI</option>
                      <option value="Urinary retention">Urinary retention</option>
                      <option value="Renal failure">Renal failure</option>
                      <option value="Respiratory failure">Respiratory failure</option>
                    </select>
                  </datalist>
                </div>
                 
                <div class="container">
                  <span>Other :</span>
                  <textarea name="Complication_other"><?php echo $row8['Complication_other'] ; ?></textarea>
                </div><br/>

                <div class="container">
                  <span>Length of hospitalization</span>
                  <input type="text" name="Length_of_hospitalization" size="5" value="<?php echo $row8['Length_of_hospitalization'] ; ?>">
                </div>

                <div class="container">
                  <span>Discharge on POD :</span>
                  <input type="text" name="Discharge" size="5" value="<?php echo $row8['Discharge'] ; ?>">
                </div><br/>

                <input type="checkbox" name="Re" value="yes" <?php echo ($row8['Re-admission']) ? 'checked' : ''; ?>>Re-admission within 14 days<br/>
                <input type="checkbox" name="Motality" value="yes" <?php echo ($row8['Motality']) ? 'checked' : ''; ?>>Motality within 30 days
              </td>
          </table>
          </div>
          
          <!--病理-->
          <div id="div9" style="display:none">
            <table cellpadding="10" border="1">
              <td valign="top">
                <u>Tumor size</u><br/>
                <div class="container">
                  <span>Long :</span> 
                  <input type="text" name="Tumor_long2" size="13" value="<?php echo $row9['Tumor size(long)']; ?>">
                </div>

                <div class="container">
                  <span>Wide :</span> 
                  <input type="text" name="Tumor_wide2" size="13"  value="<?php echo $row9['Tumor size(wide)']; ?>">
                </div>

                <div class="container">
                  <span>High :</span>
                  <input type="text" name="Tumor_high2" size="13"  value="<?php echo $row9['Tumor size(high)']; ?>">
                </div>

                <div class="container">
                  <span>Type :</span> 
                  <input list="Tumor_Type" name="Tumor_Type" type="text" size="10" value="<?php echo $row9['Tumor_Type']; ?>">
                  <datalist id="Tumor_Type">
                    <select>
                    <option value="Ulcerative">Ulcerative</option>
                    <option value="Polypoid">Polypoid</option>
                    <option value="Annular">Annular</option>
                  </select>
                  </datalist>
                </div><br/>

                <div class="container">
                  <span>Distal Margin :</span>
                  <span>
                    <input type="text" name="Distal_Margin" size="3" value="<?php echo $row9['Distal_Margin']; ?>">
                    CM
                  </span>
                </div>

                <div class="container">
                  <span>Call type :</span> 
                  <input list="Call_type" name="Call_type" type="text" value="<?php echo $row9['Call_type']; ?>">
                  <datalist id="Call_type">
                    <select>
                    <option value="Adenocarcinoma">Adenocarcinoma</option>
                    <option value="SCC">SCC</option>
                    <option value="Mucinous adenocarcinoma">Mucinous adenocarcinoma</option>
                    <option value="Signet ring cell adenocarcinoma">Signet ring cell adenocarcinoma</option>
                    <option value="Carcinoid tumor">Carcinoid tumor</option>
                    <option value="Leiomyoscarcoma">Leiomyoscarcoma</option>
                    <option value="GIST">GIST</option>
                    <option value="Others">Others</option>
                  </select>
                  </datalist>
                </div>

                <div class="container">
                  <span>Differetiatnion :</span>
                  <input list="Differetiatnion" name="Differetiatnion" type="text" size="10" value="<?php echo $row9['Differetiatnion']; ?>">
                  <datalist id="Differetiatnion">
                    <select>
                    <option value="Well">Well</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Poor">Poor</option>
                    <option value="Well to moderate">Well to moderate</option>
                    <option value="Moderate to poor">Moderate to poor</option>
                  </select>
                  </datalist>
                </div>

                <input type="checkbox" name="Lypmhatic" value="yes" <?php echo ($row9['Lypmhatic_invasion']) ? 'checked' : ''; ?>> Lypmhatic invasion<br/>
                <input type="checkbox" name="Vascular" value="yes" <?php echo ($row9['Vascular_invasion']) ? 'checked' : ''; ?>> Vascular invasion<br/>
                <input type="checkbox" name="Perineural" value="yes" <?php echo ($row9['Perineural_invasion']) ? 'checked' : ''; ?>> Perineural invasion<br/>
                
              </td>
              <td valign="top">
                <input type="checkbox" name="Synchronous_Polypo" value="yes" <?php echo ($row9['Synchronous_polypo']) ? 'checked' : ''; ?>> <u>Synchronous polypo</u><br/>
                <input type="checkbox" name="Synchronous_cancer" value="yes" <?php echo ($row9['Synchronous_cancer']) ? 'checked' : ''; ?>> <u>Synchronous cancer</u>
                <br/> <br/>

                <div class="container">
                  <span>Cut margin condition</span>
                  <input list="Cut_margin_condition" name="Cut_margin_condition" type="text" size="10" value="<?php echo $row9['Cut_margin_condition']; ?>">
                  <datalist id="Cut_margin_condition">
                    <select>
                      <option value="Clear">Clear</option>
                      <option value="Involved">Involved</option>
                  </select>
                  </datalist>
                </div>

                <div class="container">
                  <span>Number of LN examed</span>
                  <input type="text" name="LN_examed" size="5" value="<?php echo $row9['Number_of_LN_examed']; ?>">
                </div>

                <div class="container">
                  <span>Number of LN involved</span>
                  <input type="text" name="LN_involved" size="5" value="<?php echo $row9['Number_of_LN_involved']; ?>">
                </div><br/>

                <u>Final stage</u><br/>
                <div class="container">
                  <span>T : </span>
                  <input type="text" name="Final_T" size="5" value="<?php echo $row9['Final stage(T)']; ?>">
                </div>

               <div class="container">
                  <span>N : </span>
                  <input type="text" name="Final_N" size="5" value="<?php echo $row9['Final stage(N)']; ?>">
                </div>
                
                <div class="container">
                  <span>M : </span>
                  <input type="text" name="Final_M" size="5" value="<?php echo $row9['Final stage(M)']; ?>">
                </div>

                <div class="container">
                  <span>Stage : </span>
                  <input type="text" name="Final_stage" size="5" value="<?php echo $row9['Final stage(stage)']; ?>">
                </div>
              </td>
            </table>
          </div>

          <!--追加追蹤-->
          <div id="div10" style="display:none">
            <table style="text-align: center;" cellpadding="10" border="1">
              <tr>
                <th id="TH1" onclick="isHidden2('Div1'); changeColor2('TH1')" >Chemotherapy (adjavent)</th>
                <th id="TH2" onclick="isHidden2('Div2'); changeColor2('TH2')">Adjavent radiotherapy</th>
                <th id="TH3" onclick="isHidden2('Div3'); changeColor2('TH3')">Tumor marker</th>
                <th id="TH4" onclick="isHidden2('Div4'); changeColor2('TH4')">Colonoscopy</th>
                <th id="TH5" onclick="isHidden2('Div5'); changeColor2('TH5')">PET</th>
              </tr>
              <tr>
                <td colspan="5">
                  <!--Chemotherapy-->
                  <div id="Div1" style="display:block;">
                    <table  class="second-table" cellpadding="10" border="1">
                      <tr>
                        <th width="40px">次數</th>
                        <th >Start time</th>
                        <th >End time</th>
                      </tr>
                     <tr>
                        <td>1</td>
                        <td><input type="date" name="start1" value="<?php echo $row10['Start time 1']; ?>"></td>
                        <td><input type="date" name="end1" value="<?php echo $row10['End time 1']; ?>"></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td><input type="date" name="start2" value="<?php echo $row10['Start time 2']; ?>"></td>
                        <td><input type="date" name="end2" value="<?php echo $row10['End time 2']; ?>"></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td><input type="date" name="start3" value="<?php echo $row10['Start time 3']; ?>"></td>
                        <td><input type="date" name="end3" value="<?php echo $row10['End time 3']; ?>"></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td><input type="date" name="start4" value="<?php echo $row10['Start time 4']; ?>"></td>
                        <td><input type="date" name="end4" value="<?php echo $row10['End time 4']; ?>"></td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td><input type="date" name="start5" value="<?php echo $row10['Start time 5']; ?>"></td>
                        <td><input type="date" name="end5" value="<?php echo $row10['End time 5']; ?>"></td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td><input type="date" name="start6" value="<?php echo $row10['Start time 6']; ?>"></td>
                        <td><input type="date" name="end6" value="<?php echo $row10['End time 6']; ?>"></td>
                      </tr>
                      <tr>
                        <td>7</td>
                        <td><input type="date" name="start7" value="<?php echo $row10['Start time 7']; ?>"></td>
                        <td><input type="date" name="end7" value="<?php echo $row10['End time 7']; ?>"></td>
                      </tr>
                      <tr>
                        <td>8</td>
                        <td><input type="date" name="start8" value="<?php echo $row10['Start time 8']; ?>"></td>
                        <td><input type="date" name="end8" value="<?php echo $row10['End time 8']; ?>"></td>
                      </tr>
                      <tr>
                        <td>9</td>
                        <td><input type="date" name="start9" value="<?php echo $row10['Start time 9']; ?>"></td>
                        <td><input type="date" name="end9" value="<?php echo $row10['End time 9']; ?>"></td>
                      </tr>
                      <tr>
                        <td>10</td>
                        <td><input type="date" name="start10" value="<?php echo $row10['Start time 10']; ?>"></td>
                        <td><input type="date" name="end10" value="<?php echo $row10['End time 10']; ?>"></td>
                      </tr>
                    </table>
                  </div>

                  <!--Adjavent radiotherapy-->
                  <div id="Div2" style="display:none;">
                    <table class="second-table" cellpadding="10" border="1">
                      <tr>
                        <th width="40px">次數</th>
                        <th >Start time</th>
                        <th>End time</th>
                        <th>Dose</th>
                      </tr>
                     <tr>
                        <td>1</td>
                        <td><input type="date" name="s1" value="<?php echo $row11['Start time 1']; ?>"></td>
                        <td><input type="date" name="e1" value="<?php echo $row11['End time 1']; ?>"></td>
                        <td><input type="text" size="5" name="d1" value="<?php echo $row11['Dose 1']; ?>"></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td><input type="date" name="s2" value="<?php echo $row11['Start time 2']; ?>"></td>
                        <td><input type="date" name="e2" value="<?php echo $row11['End time 2']; ?>"></td>
                        <td><input type="text" size="5" name="d2" value="<?php echo $row11['Dose 2']; ?>"></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td><input type="date" name="s3" value="<?php echo $row11['Start time 3']; ?>"></td>
                        <td><input type="date" name="e3" value="<?php echo $row11['End time 3']; ?>"></td>
                        <td><input type="text" size="5" name="d3" value="<?php echo $row11['Dose 3']; ?>"></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td><input type="date" name="s4" value="<?php echo $row11['Start time 4']; ?>"></td>
                        <td><input type="date" name="e4" value="<?php echo $row11['End time 4']; ?>"></td>
                        <td><input type="text" size="5" name="d4" value="<?php echo $row11['Dose 4']; ?>"></td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td><input type="date" name="s5" value="<?php echo $row11['Start time 5']; ?>"></td>
                        <td><input type="date" name="e5" value="<?php echo $row11['End time 5']; ?>"></td>
                        <td><input type="text" size="5" name="d5" value="<?php echo $row11['Dose 5']; ?>"></td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td><input type="date" name="s6" value="<?php echo $row11['Start time 6']; ?>"></td>
                        <td><input type="date" name="e6" value="<?php echo $row11['End time 6']; ?>"></td>
                        <td><input type="text" size="5" name="d6" value="<?php echo $row11['Dose 6']; ?>"></td>
                      </tr>
                      <tr>
                        <td>7</td>
                        <td><input type="date" name="s7" value="<?php echo $row11['Start time 7']; ?>"></td>
                        <td><input type="date" name="e7" value="<?php echo $row11['End time 7']; ?>"></td>
                        <td><input type="text" size="5" name="d7" value="<?php echo $row11['Dose 7']; ?>"></td>
                      </tr>
                      <tr>
                        <td>8</td>
                        <td><input type="date" name="s8" value="<?php echo $row11['Start time 8']; ?>"></td>
                        <td><input type="date" name="e8" value="<?php echo $row11['End time 8']; ?>"></td>
                        <td><input type="text" size="5" name="d8" value="<?php echo $row11['Dose 8']; ?>"></td>
                      </tr>
                      <tr>
                        <td>9</td>
                        <td><input type="date" name="s9" value="<?php echo $row11['Start time 9']; ?>"></td>
                        <td><input type="date" name="e9" value="<?php echo $row11['End time 9']; ?>"></td>
                        <td><input type="text" size="5" name="d9" value="<?php echo $row11['Dose 9']; ?>"></td>
                      </tr>
                      <tr>
                        <td>10</td>
                        <td><input type="date" name="s10" value="<?php echo $row11['Start time 10']; ?>"></td>
                        <td><input type="date" name="e10" value="<?php echo $row11['End time 10']; ?>"></td>
                        <td><input type="text" size="5" name="d10" value="<?php echo $row11['Dose 10']; ?>"></td>
                      </tr>
                    </table>
                  </div>

                  <!--Tumor marker-->
                  <div id="Div3" style="display:none;">
                    <table class="second-table" cellpadding="10" border="1">
                      <tr>
                        <th width="40px">次數</th>
                        <th>Time</th>
                        <th>CEA</th>
                        <th>CA-125</th>
                        <th>CA-199</th>
                        <th>Others</th>
                      </tr>
                     <tr>
                        <td>1</td>
                        <td><input type="date" name="Td1" value="<?php echo $row12['Time(1)']; ?>"></td>
                        <td><input type="text" size="8" name="TC1" value="<?php echo $row12['CEA(1)']; ?>"></td>
                        <td><input type="text" size="8" name="T1251" value="<?php echo $row12['CA-125(1)']; ?>"></td>
                        <td><input type="text" size="8" name="T1991" value="<?php echo $row12['CA-199(1)']; ?>"></td>
                        <td><input type="text" size="8" name="To1"  value="<?php echo $row12['Time(1)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td><input type="date" name="Td2" value="<?php echo $row12['Time(2)']; ?>"></td>
                        <td><input type="text" size="8" name="TC2" value="<?php echo $row12['CEA(2)']; ?>"></td>
                        <td><input type="text" size="8" name="T1252" value="<?php echo $row12['CA-125(2)']; ?>"></td>
                        <td><input type="text" size="8" name="T1992" value="<?php echo $row12['CA-199(2)']; ?>"></td>
                        <td><input type="text" size="8" name="To2" value="<?php echo $row12['Time(2)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td><input type="date" name="Td3" value="<?php echo $row12['Time(3)']; ?>"></td>
                        <td><input type="text" size="8" name="TC3" value="<?php echo $row12['CEA(3)']; ?>"></td>
                        <td><input type="text" size="8" name="T1253"  value="<?php echo $row12['CA-125(3)']; ?>"></td>
                        <td><input type="text" size="8" name="T1993" value="<?php echo $row12['CA-199(3)']; ?>"></td>
                        <td><input type="text" size="8" name="To3" value="<?php echo $row12['Time(3)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td><input type="date" name="Td4" value="<?php echo $row12['Time(4)']; ?>"></td>
                        <td><input type="text" size="8" name="TC4"  value="<?php echo $row12['CEA(4)']; ?>"></td>
                        <td><input type="text" size="8" name="T1254" value="<?php echo $row12['CA-125(4)']; ?>"></td>
                        <td><input type="text" size="8" name="T1994" value="<?php echo $row12['CA-199(4)']; ?>"></td>
                        <td><input type="text" size="8" name="To4" value="<?php echo $row12['Time(4)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td><input type="date" name="Td5" value="<?php echo $row12['Time(5)']; ?>"></td>
                        <td><input type="text" size="8" name="TC5"  value="<?php echo $row12['CEA(5)']; ?>"></td>
                        <td><input type="text" size="8" name="T1255" value="<?php echo $row12['CA-125(5)']; ?>"></td>
                        <td><input type="text" size="8" name="T1995" value="<?php echo $row12['CA-199(5)']; ?>"></td>
                        <td><input type="text" size="8" name="To5" value="<?php echo $row12['Time(5)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td><input type="date" name="Td6" value="<?php echo $row12['Time(6)']; ?>"></td>
                        <td><input type="text" size="8" name="TC6" value="<?php echo $row12['CEA(6)']; ?>"></td>
                        <td><input type="text" size="8" name="T1256" value="<?php echo $row12['CA-125(6)']; ?>"></td>
                        <td><input type="text" size="8" name="T1996" value="<?php echo $row12['CA-199(6)']; ?>"></td>
                        <td><input type="text" size="8" name="To6" value="<?php echo $row12['Time(6)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>7</td>
                        <td><input type="date" name="Td7" value="<?php echo $row12['Time(7)']; ?>"></td>
                        <td><input type="text" size="8" name="TC7" value="<?php echo $row12['CEA(7)']; ?>"></td>
                        <td><input type="text" size="8" name="T1257" value="<?php echo $row12['CA-125(7)']; ?>"></td>
                        <td><input type="text" size="8" name="T1997" value="<?php echo $row12['CA-199(7)']; ?>"></td>
                        <td><input type="text" size="8" name="To7" value="<?php echo $row12['Time(7)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>8</td>
                        <td><input type="date" name="Td8" value="<?php echo $row12['Time(8)']; ?>"></td>
                        <td><input type="text" size="8" name="TC8" value="<?php echo $row12['CEA(8)']; ?>"></td>
                        <td><input type="text" size="8" name="T1258" value="<?php echo $row12['CA-125(8)']; ?>"></td>
                        <td><input type="text" size="8" name="T1998" value="<?php echo $row12['CA-199(8)']; ?>"></td>
                        <td><input type="text" size="8" name="To8" value="<?php echo $row12['Time(8)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>9</td>
                        <td><input type="date" name="Td9" value="<?php echo $row12['Time(9)']; ?>"></td>
                        <td><input type="text" size="8" name="TC9" value="<?php echo $row12['CEA(9)']; ?>"></td>
                        <td><input type="text" size="8" name="T1259" value="<?php echo $row12['CA-125(9)']; ?>"></td>
                        <td><input type="text" size="8" name="T1999" value="<?php echo $row12['CA-199(9)']; ?>"></td>
                        <td><input type="text" size="8" name="To9" value="<?php echo $row12['Time(9)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>10</td>
                        <td><input type="date" name="Td0" value="<?php echo $row12['Time(10)']; ?>"></td>
                        <td><input type="text" size="8" name="TC0" value="<?php echo $row12['CEA(10)']; ?>"></td>
                        <td><input type="text" size="8" name="T1250" value="<?php echo $row12['CA-125(10)']; ?>"></td>
                        <td><input type="text" size="8" name="T1990" value="<?php echo $row12['CA-199(10)']; ?>"></td>
                        <td><input type="text" size="8" name="To0" value="<?php echo $row12['Time(10)']; ?>"></td>
                      </tr>
                    </table>
                  </div>

                  <!--colonoscopy-->
                  <div id="Div4" style="display:none;">
                    <table class="second-table" cellpadding="10" border="1">
                      <tr>
                        <th width="40px">次數</th>
                        <th>Time</th>
                        <th>Fundings</th>
                        <th>Polyp number</th>
                        <th>Polyp side</th>
                        <th>Other</th>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td><input type="date" name="ACt1" value="<?php echo $row13['Time(1)']; ?>"></td>
                        <td><input type="text" size="8" name="ACF1" value="<?php echo $row13['Fundings(1)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPn1" value="<?php echo $row13['Polyp number(1)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPs1" value="<?php echo $row13['Polyp side(1)']; ?>"></td>
                        <td><input type="text" size="8" name="ACo1" value="<?php echo $row13['Other(1)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td><input type="date" name="ACt2" value="<?php echo $row13['Time(2)']; ?>"></td>
                        <td><input type="text" size="8" name="ACF2" value="<?php echo $row13['Fundings(2)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPn2" value="<?php echo $row13['Polyp number(2)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPs2" value="<?php echo $row13['Polyp side(2)']; ?>"></td>
                        <td><input type="text" size="8" name="ACo2" value="<?php echo $row13['Other(2)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td><input type="date" name="ACt3" value="<?php echo $row13['Time(3)']; ?>"></td>
                        <td><input type="text" size="8" name="ACF3" value="<?php echo $row13['Fundings(3)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPn3" value="<?php echo $row13['Polyp number(3)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPs3" value="<?php echo $row13['Polyp side(3)']; ?>"></td>
                        <td><input type="text" size="8" name="ACo3" value="<?php echo $row13['Other(3)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td><input type="date" name="ACt4" value="<?php echo $row13['Time(4)']; ?>"></td>
                        <td><input type="text" size="8" name="ACF4" value="<?php echo $row13['Fundings(4)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPn4" value="<?php echo $row13['Polyp number(4)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPs4" value="<?php echo $row13['Polyp side(4)']; ?>"></td>
                        <td><input type="text" size="8" name="ACo4" value="<?php echo $row13['Other(4)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td><input type="date" name="ACt5" value="<?php echo $row13['Time(5)']; ?>"></td>
                        <td><input type="text" size="8" name="ACF5" value="<?php echo $row13['Fundings(5)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPn5" value="<?php echo $row13['Polyp number(5)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPs5" value="<?php echo $row13['Polyp side(5)']; ?>"></td>
                        <td><input type="text" size="8" name="ACo5" value="<?php echo $row13['Other(5)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td><input type="date" name="ACt6" value="<?php echo $row13['Time(6)']; ?>"></td>
                        <td><input type="text" size="8" name="ACF6" value="<?php echo $row13['Fundings(6)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPn6" value="<?php echo $row13['Polyp number(6)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPs6" value="<?php echo $row13['Polyp side(6)']; ?>"></td>
                        <td><input type="text" size="8" name="ACo6" value="<?php echo $row13['Other(6)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>7</td>
                        <td><input type="date" name="ACt7" value="<?php echo $row13['Time(7)']; ?>"></td>
                        <td><input type="text" size="8" name="ACF7" value="<?php echo $row13['Fundings(7)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPn7" value="<?php echo $row13['Polyp number(7)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPs7" value="<?php echo $row13['Polyp side(7)']; ?>"></td>
                        <td><input type="text" size="8" name="ACo7" value="<?php echo $row13['Other(7)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>8</td>
                        <td><input type="date" name="ACt8" value="<?php echo $row13['Time(8)']; ?>"></td>
                        <td><input type="text" size="8" name="ACF8" value="<?php echo $row13['Fundings(8)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPn8" value="<?php echo $row13['Polyp number(8)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPs8" value="<?php echo $row13['Polyp side(8)']; ?>"></td>
                        <td><input type="text" size="8" name="ACo8" value="<?php echo $row13['Other(8)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>9</td>
                        <td><input type="date" name="ACt9" value="<?php echo $row13['Time(9)']; ?>"></td>
                        <td><input type="text" size="8" name="ACF9" value="<?php echo $row13['Fundings(9)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPn9" value="<?php echo $row13['Polyp number(9)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPs9" value="<?php echo $row13['Polyp side(9)']; ?>"></td>
                        <td><input type="text" size="8" name="ACo9" value="<?php echo $row13['Other(9)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>10</td>
                        <td><input type="date" name="ACt0" value="<?php echo $row13['Time(10)']; ?>"></td>
                        <td><input type="text" size="8" name="ACF0" value="<?php echo $row13['Fundings(10)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPn0" value="<?php echo $row13['Polyp number(10)']; ?>"></td>
                        <td><input type="text" size="8" name="ACPs0" value="<?php echo $row13['Polyp side(10)']; ?>"></td>
                        <td><input type="text" size="8" name="ACo0" value="<?php echo $row13['Other(10)']; ?>"></td>
                      </tr>
                    </table>
                  </div>

                  <!--PET-->
                  <div id="Div5" style="display:none;">
                    <table class="second-table" cellpadding="10" border="1">
                      <tr>
                        <th width="40px">次數</th>
                        <th>Time</th>
                        <th>Fundings</th>
                        <th>Other</th>
                      </tr>
                     <tr>
                        <td>1</td>
                        <td><input type="date" name="PETt1" value="<?php echo $row14['Time(1)']; ?>"></td>
                        <td><input type="text" size="8" name="PETf1" value="<?php echo $row14['Fundings(1)']; ?>"></td>
                        <td><input type="text" size="8" name="PETo1" value="<?php echo $row14['Other(1)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td><input type="date" name="PETt2" value="<?php echo $row14['Time(2)']; ?>"></td>
                        <td><input type="text" size="8" name="PETf2" value="<?php echo $row14['Fundings(2)']; ?>"></td>
                        <td><input type="text" size="8" name="PETo2" value="<?php echo $row14['Other(2)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td><input type="date" name="PETt3" value="<?php echo $row14['Time(3)']; ?>"></td>
                        <td><input type="text" size="8" name="PETf3" value="<?php echo $row14['Fundings(3)']; ?>"></td>
                        <td><input type="text" size="8" name="PETo3" value="<?php echo $row14['Other(3)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td><input type="date" name="PETt4" value="<?php echo $row14['Time(4)']; ?>"></td>
                        <td><input type="text" size="8" name="PETf4" value="<?php echo $row14['Fundings(4)']; ?>"></td>
                        <td><input type="text" size="8" name="PETo4" value="<?php echo $row14['Other(4)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td><input type="date" name="PETt5" value="<?php echo $row14['Time(5)']; ?>"></td>
                        <td><input type="text" size="8" name="PETf5" value="<?php echo $row14['Fundings(5)']; ?>"></td>
                        <td><input type="text" size="8" name="PETo5" value="<?php echo $row14['Other(5)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td><input type="date" name="PETt6" value="<?php echo $row14['Time(6)']; ?>"></td>
                        <td><input type="text" size="8" name="PETf6" value="<?php echo $row14['Fundings(6)']; ?>"></td>
                        <td><input type="text" size="8" name="PETo6" value="<?php echo $row14['Other(6)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>7</td>
                        <td><input type="date" name="PETt7" value="<?php echo $row14['Time(7)']; ?>"></td>
                        <td><input type="text" size="8" name="PETf7" value="<?php echo $row14['Fundings(7)']; ?>"></td>
                        <td><input type="text" size="8" name="PETo7" value="<?php echo $row14['Other(7)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>8</td>
                        <td><input type="date" name="PETt8" value="<?php echo $row14['Time(8)']; ?>"></td>
                        <td><input type="text" size="8" name="PETf8" value="<?php echo $row14['Fundings(8)']; ?>"></td>
                        <td><input type="text" size="8" name="PETo8" value="<?php echo $row14['Other(8)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>9</td>
                        <td><input type="date" name="PETt9" value="<?php echo $row14['Time(9)']; ?>"></td>
                        <td><input type="text" size="8" name="PETf9" value="<?php echo $row14['Fundings(9)']; ?>"></td>
                        <td><input type="text" size="8" name="PETo9" value="<?php echo $row14['Other(9)']; ?>"></td>
                      </tr>
                      <tr>
                        <td>10</td>
                        <td><input type="date" name="PETt0" value="<?php echo $row14['Time(10)']; ?>"></td>
                        <td><input type="text" size="8" name="PETf0" value="<?php echo $row14['Fundings(10)']; ?>"></td>
                        <td><input type="text" size="8" name="PETo0" value="<?php echo $row14['Other(10)']; ?>"></td>
                      </tr>
                    </table>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
    
    </table>
    </form>
  </body>
</html>