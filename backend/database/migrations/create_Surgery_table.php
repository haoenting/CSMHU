<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::connection('patient_db')->create('Surgery', function (Blueprint $table) {  
            $table->string('basic_information_id');
            $table->foreign('basic_information_id')->references('ID')->on('Basic_information')->onDelete('cascade');
            $table->date('Operatin_date')->nullable();
            $table->string('OP_method1')->nullable()->default('');
            $table->string('OP_method2')->nullable()->default('');
            $table->string('Extent_of_sugery')->nullable()->default('');
            $table->string('Anesthesia_type')->nullable()->default('');
            $table->string('OP_time')->nullable()->default('');
            $table->string('Blood_loss')->nullable()->default('');
            $table->string('P_RBC2')->nullable()->default('');
            $table->string('Whole_blood2')->nullable()->default('');
            $table->string('FFP2')->nullable()->default('');
            $table->string('Platelet2')->nullable()->default('');
            $table->string('Type_of_incision')->nullable()->default('');
            $table->string('Ascitis_color')->nullable()->default('');
            $table->string('Synchronous_colonic_tumor_site')->nullable()->default('');
            $table->boolean('Peritoneal_seeding')->nullable()->default(false);
            $table->string('Tumor_site')->nullable()->default('');
            $table->string('Type_of_Anastomosis')->nullable()->default('');
            $table->string('Anastomosis_to_anal_verge')->nullable()->default('');
            $table->string('Distal_distence')->nullable()->default('');
            $table->string('Tumor_long')->nullable()->default('');
            $table->string('Tumor_wide')->nullable()->default('');
            $table->string('Tumor_High')->nullable()->default('');
            $table->string('Type_of_tumor')->nullable()->default('');
            $table->boolean('Perforation')->nullable()->default(false);
            $table->boolean('Obstruction2')->nullable()->default(false);
            $table->string('Invasion_other')->nullable()->default('');
            $table->boolean('Combined_resection')->nullable()->default(false);
            $table->string('Palpable_LNs')->nullable()->default('');
            $table->string('Liver_nodule')->nullable()->default('');
            $table->string('Management')->nullable()->default('');
            $table->string('Protective_stoma')->nullable()->default('');
            $table->boolean('Intracolonic')->nullable()->default(false);
            $table->string('Reason_of_palliative_TX')->nullable()->default('');
        });
    }

    public function down(): void{
        Schema::connection('patient_db')->dropIfExists('Surgery');
    }
};
