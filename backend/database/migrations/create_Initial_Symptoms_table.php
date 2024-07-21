<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::connection('patient_db')->create('Initial_Symptoms', function (Blueprint $table) {
            $table->string('basic_information_id');
            $table->foreign('basic_information_id')->references('ID')->on('Basic_information')->onDelete('cascade');
            $table->boolean('Stool_OB')->nullable()->default(false);
            $table->boolean('Colonoscocopy')->nullable()->default(false);
            $table->boolean('CEA1')->nullable()->default(false);
            $table->boolean('CT')->nullable()->default(false);
            $table->boolean('MRI')->nullable()->default(false);
            $table->boolean('PET')->nullable()->default(false);
            $table->boolean('Fresh_blood')->nullable()->default(false);
            $table->boolean('Bloody_stool')->nullable()->default(false);
            $table->boolean('Melanoma')->nullable()->default(false);
            $table->boolean('Small_caliber_of_stool')->nullable()->default(false);
            $table->boolean('Tenesmus')->nullable()->default(false);
            $table->boolean('Constipation')->nullable()->default(false);
            $table->boolean('Diarrhea')->nullable()->default(false);
            $table->boolean('Mucus_passage')->nullable()->default(false);
            $table->boolean('Abdomen_pain')->nullable()->default(false);
            $table->boolean('Abdomen_distention')->nullable()->default(false);
            $table->boolean('Abdomen_fullness')->nullable()->default(false);
            $table->boolean('Abdomen_mass')->nullable()->default(false);
            $table->boolean('Vomiting')->nullable()->default(false);
            $table->boolean('Loss_appetite')->nullable()->default(false);
            $table->boolean('Anemia')->nullable()->default(false);
            $table->string('weight_loss')->nullable()->default('');
            $table->boolean('Peritonitis')->nullable()->default(false);
            $table->string('Distal_metastasis')->nullable()->default('');
            $table->string('Other_SS')->nullable()->default('');
            $table->string('Duration_Initial_symptom')->nullable()->default('');
        });
    }

    public function down(): void{
        Schema::connection('patient_db')->dropIfExists('Initial_Symptoms');
    }
};
