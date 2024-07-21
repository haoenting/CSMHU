<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::connection('patient_db')->create('PET', function (Blueprint $table) {  
            $table->string('basic_information_id');
            $table->foreign('basic_information_id')->references('ID')->on('Basic_information')->onDelete('cascade');
            $table->date('PETt_1')->nullable();
            $table->string('PETf_1')->nullable()->default('');
            $table->string('PETo_1')->nullable()->default('');
            $table->date('PETt_2')->nullable();
            $table->string('PETf_2')->nullable()->default('');
            $table->string('PETo_2')->nullable()->default('');
            $table->date('PETt_3')->nullable();
            $table->string('PETf_3')->nullable()->default('');
            $table->string('PETo_3')->nullable()->default('');
            $table->date('PETt_4')->nullable();
            $table->string('PETf_4')->nullable()->default('');
            $table->string('PETo_4')->nullable()->default('');
            $table->date('PETt_5')->nullable();
            $table->string('PETf_5')->nullable()->default('');
            $table->string('PETo_5')->nullable()->default('');
            $table->date('PETt_6')->nullable();
            $table->string('PETf_6')->nullable()->default('');
            $table->string('PETo_6')->nullable()->default('');
            $table->date('PETt_7')->nullable();
            $table->string('PETf_7')->nullable()->default('');
            $table->string('PETo_7')->nullable()->default('');
            $table->date('PETt_8')->nullable();
            $table->string('PETf_8')->nullable()->default('');
            $table->string('PETo_8')->nullable()->default('');
            $table->date('PETt_9')->nullable();
            $table->string('PETf_9')->nullable()->default('');
            $table->string('PETo_9')->nullable()->default('');
            $table->date('PETt_10')->nullable();
            $table->string('PETf_10')->nullable()->default('');
            $table->string('PETo_10')->nullable()->default('');
        });
    }

    public function down(): void{
        Schema::connection('patient_db')->dropIfExists('PET');
    }
};
