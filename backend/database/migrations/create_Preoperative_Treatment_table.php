<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::connection('patient_db')->create('Preoperative_Treatment', function (Blueprint $table) {  
            $table->string('basic_information_id');
            $table->foreign('basic_information_id')->references('ID')->on('Basic_information')->onDelete('cascade');
            $table->boolean('Albumin2')->nullable()->default(false);
            $table->boolean('PPN')->nullable()->default(false);
            $table->boolean('TPN')->nullable()->default(false);
            $table->string('days')->nullable()->default('');
            $table->string('P_RBC')->nullable()->default('');
            $table->string('Whole_blood')->nullable()->default('');
            $table->string('FFP')->nullable()->default('');
            $table->string('Platelet')->nullable()->default('');
            $table->string('Colon_preparation_Type')->nullable()->default('');
            $table->string('Laxativs')->nullable()->default('');
            $table->boolean('Oral_antibiotics')->nullable()->default(false);
            $table->boolean('Retention_enema')->nullable()->default(false);
            $table->boolean('Cafazolin')->nullable()->default(false);
            $table->boolean('Gentamicin')->nullable()->default(false);
            $table->boolean('Metronidazole')->nullable()->default(false);
            $table->string('Pre_OP_Other')->nullable()->default('');
        });
    }

    public function down(): void{
        Schema::connection('patient_db')->dropIfExists('Preoperative_Treatment');
    }
};
