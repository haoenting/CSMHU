<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::connection('patient_db')->create('Postoperative_Condition', function (Blueprint $table) {  
            $table->string('basic_information_id');
            $table->foreign('basic_information_id')->references('ID')->on('Basic_information')->onDelete('cascade');
            $table->string('Cefazoline2')->nullable()->default('');
            $table->string('Gentamicin2')->nullable()->default('');
            $table->string('Metronidazole2')->nullable()->default('');
            $table->string('Antiobitics_other')->nullable()->default('');
            $table->string('DC4')->nullable()->default('');
            $table->string('NG')->nullable()->default('');
            $table->string('POD1')->nullable()->default('');
            $table->string('PCA')->nullable()->default('');
            $table->string('POD2')->nullable()->default('');
            $table->string('Flatus')->nullable()->default('');
            $table->string('Defecation')->nullable()->default('');
            $table->string('Try_water')->nullable()->default('');
            $table->string('Soft_diet')->nullable()->default('');
            $table->string('Surgical')->nullable()->default('');
            $table->string('Medical')->nullable()->default('');
            $table->string('Complication_other')->nullable()->default('');
            $table->string('Length_of_hospitalization')->nullable()->default('');
            $table->string('Discharge')->nullable()->default('');
            $table->boolean('Re')->nullable()->default(false);
            $table->boolean('Motality')->nullable()->default(false);
        });
    }

    public function down(): void{
        Schema::connection('patient_db')->dropIfExists('Postoperative_Condition');
    }
};
