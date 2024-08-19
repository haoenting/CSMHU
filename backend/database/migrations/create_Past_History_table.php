<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{

        Schema::connection('patient_db')->create('Past_History', function (Blueprint $table) {
            $table->string('basic_information_id');
            $table->foreign('basic_information_id')->references('Chart')->on('Basic_information')->onDelete('cascade');
            $table->boolean('DM')->nullable()->default(false);
            $table->boolean('HTM')->nullable()->default(false);
            $table->boolean('CVA')->nullable()->default(false);
            $table->boolean('CAD')->nullable()->default(false);
            $table->boolean('COPD')->nullable()->default(false);
            $table->boolean('CHF')->nullable()->default(false);
            $table->boolean('Liver_cirrhosis')->nullable()->default(false);
            $table->boolean('Gout')->nullable()->default(false);
            $table->string('MD_other')->nullable()->default('');
            $table->string('Surgical_history')->nullable()->default('');
            $table->string('Smoking')->nullable()->default('');
            $table->string('Drinking')->nullable()->default('');
            $table->string('Betal_nut')->nullable()->default('');
            $table->boolean('Family_CRC_1')->nullable()->default(false);
            $table->boolean('Family_CRC_2')->nullable()->default(false);
            $table->boolean('Family_CRC_3')->nullable()->default(false);
            $table->boolean('Family_GI_cancer')->nullable()->default(false);
            $table->string('Family_other_cancer')->nullable()->default('');
        });
    }

    public function down(): void{
        Schema::connection('patient_db')->dropIfExists('Past_History');
    }
};
