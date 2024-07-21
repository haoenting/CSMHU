<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::connection('patient_db')->create('CCRT', function (Blueprint $table) {  
            $table->string('basic_information_id');
            $table->foreign('basic_information_id')->references('ID')->on('Basic_information')->onDelete('cascade');
            $table->boolean('UFT')->nullable()->default(false);
            $table->boolean('Xeloda')->nullable()->default(false);
            $table->string('Neoadjavent_dose')->nullable()->default('');
            $table->string('Side_effect')->nullable()->default('');
            $table->string('Time_to_surgery')->nullable()->default('');
        });
    }

    public function down(): void{
        Schema::connection('patient_db')->dropIfExists('CCRT');
    }
};
