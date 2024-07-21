<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::connection('patient_db')->create('Pathology', function (Blueprint $table) {  
            $table->string('basic_information_id');
            $table->foreign('basic_information_id')->references('ID')->on('Basic_information')->onDelete('cascade');
            $table->string('Tumor_long2')->nullable()->default('');
            $table->string('Tumor_wide2')->nullable()->default('');
            $table->string('Tumor_high2')->nullable()->default('');
            $table->string('Tumor_Type')->nullable()->default('');
            $table->string('Distal_Margin')->nullable()->default('');
            $table->string('Call_type')->nullable()->default('');
            $table->string('Differetiatnion')->nullable()->default('');
            $table->boolean('Lypmhatic')->nullable()->default(false);
            $table->boolean('Vascular')->nullable()->default(false);
            $table->boolean('Perineural')->nullable()->default(false);
            $table->boolean('Synchronous_Polypo')->nullable()->default(false);
            $table->boolean('Synchronous_cancer')->nullable()->default(false);
            $table->string('Cut_margin_condition')->nullable()->default(false);
            $table->string('LN_examed')->nullable()->default('');
            $table->string('LN_involved')->nullable()->default('');
            $table->string('Final_T')->nullable()->default('');
            $table->string('Final_N')->nullable()->default('');
            $table->string('Final_M')->nullable()->default('');
            $table->string('Final_stage')->nullable()->default('');
        });
    }

    public function down(): void{
        Schema::connection('patient_db')->dropIfExists('Pathology');
    }
};
