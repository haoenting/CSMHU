<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::connection('patient_db')->create('Basic_information', function (Blueprint $table) {
            $table->string('Chart')->primary(); // 病例號
            $table->string('ID')->nullable();// 身分證
            $table->string('Name')->nullable();
            $table->date('Birthday')->nullable();
            $table->string('Gender')->nullable()->default('');
            $table->string('Native')->nullable()->default('');
            $table->string('Dx')->nullable()->default('');
            $table->string('Visiting_staff')->nullable()->default('');
            $table->string('Operator')->nullable()->default('');
            $table->string('Source')->nullable()->default('');
            $table->boolean('HNPCC')->nullable()->default(false);
            $table->boolean('FAP')->nullable()->default(false);
            $table->date('Date_of_initial_diagnosis')->nullable();
            $table->boolean('Metastases')->nullable()->default(false);
            $table->date('Date_of_metastases_noted')->nullable();
            $table->date('Time_of_last_follow')->nullable();
            $table->date('Date_of_mortality')->nullable();
            $table->string('Survival_time')->nullable();
            $table->string('DT_summary')->nullable()->default('');
            $table->string('creater')->nullable()->default('');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::connection('patient_db')->dropIfExists('Basic_information');
    }
};
