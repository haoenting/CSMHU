<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::connection('patient_db')->create('Preoperative_Assessment', function (Blueprint $table) {  
            $table->string('basic_information_id');
            $table->foreign('basic_information_id')->references('Chart')->on('Basic_information')->onDelete('cascade');
            $table->string('Hemoglobin')->nullable()->default('');
            $table->string('WBC')->nullable()->default('');
            $table->string('Platelet')->nullable()->default('');
            $table->string('GOT')->nullable()->default('');
            $table->string('GPT')->nullable()->default('');
            $table->string('ALk')->nullable()->default('');
            $table->string('BilT')->nullable()->default('');
            $table->string('BilD')->nullable()->default('');
            $table->string('Albumin')->nullable()->default('');
            $table->string('BUN')->nullable()->default('');
            $table->string('Creatinine')->nullable()->default('');
            $table->string('Na')->nullable()->default('');
            $table->string('K')->nullable()->default('');
            $table->string('PT')->nullable()->default('');
            $table->string('APTT')->nullable()->default('');
            $table->string('INR')->nullable()->default('');
            $table->string('CEA')->nullable()->default('');
            $table->string('CA125')->nullable()->default('');
            $table->string('CA199')->nullable()->default('');
            $table->string('Other4_1')->nullable()->default('');
            $table->string('Stool_OB2')->nullable()->default('');
            $table->string('Bone_scan')->nullable()->default('');
            $table->boolean('MRI2')->nullable()->default(false);
            $table->string('PET_scan')->nullable()->default('');
            $table->string('Scopy')->nullable()->default('');
            $table->string('Scopy_c')->nullable()->default('');
            $table->string('Up_to')->nullable()->default('');
            $table->string('Obstruction')->nullable()->default('');
            $table->string('Tumor_location')->nullable()->default('');
            $table->string('Distence_from_AV')->nullable()->default('');
            $table->boolean('Polyps1')->nullable()->default(false);
            $table->string('CXR')->nullable()->default('');
            $table->boolean('Wall_thickening')->nullable()->default(false);
            $table->boolean('Involving_adjvcent_organ')->nullable()->default(false);
            $table->boolean('LN_enlargement')->nullable()->default(false);
            $table->boolean('Liver_lodules')->nullable()->default(false);
            $table->string('Other4_2')->nullable()->default('');
            $table->string('Barium_enema')->nullable()->default('');
            $table->boolean('Polyps2')->nullable()->default(false);
            $table->string('Abdominal_sonography')->nullable()->default('');
            $table->string('Noudle_number')->nullable()->default('');
            $table->string('Other4_3')->nullable()->default('');
            $table->string('Other4_4')->nullable()->default('');
        });
    }

    public function down(): void{
        Schema::connection('patient_db')->dropIfExists('Preoperative_Assessment');
    }
};
