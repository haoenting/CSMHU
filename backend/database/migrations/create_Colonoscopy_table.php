<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::connection('patient_db')->create('Colonoscopy', function (Blueprint $table) {  
            $table->string('basic_information_id');
            $table->foreign('basic_information_id')->references('ID')->on('Basic_information')->onDelete('cascade');
            $table->time('ACt_1')->nullable();
            $table->string('ACF_1')->nullable()->default('');
            $table->string('ACPn_1')->nullable()->default('');
            $table->string('ACPs_1')->nullable()->default('');
            $table->string('ACo_1')->nullable()->default('');
            $table->time('ACt_2')->nullable();
            $table->string('ACF_2')->nullable()->default('');
            $table->string('ACPn_2')->nullable()->default('');
            $table->string('ACPs_2')->nullable()->default('');
            $table->string('ACo_2')->nullable()->default('');
            $table->time('ACt_3')->nullable();
            $table->string('ACF_3')->nullable()->default('');
            $table->string('ACPn_3')->nullable()->default('');
            $table->string('ACPs_3')->nullable()->default('');
            $table->string('ACo_3')->nullable()->default('');
            $table->time('ACt_4')->nullable();
            $table->string('ACF_4')->nullable()->default('');
            $table->string('ACPn_4')->nullable()->default('');
            $table->string('ACPs_4')->nullable()->default('');
            $table->string('ACo_4')->nullable()->default('');
            $table->time('ACt_5')->nullable();
            $table->string('ACF_5')->nullable()->default('');
            $table->string('ACPn_5')->nullable()->default('');
            $table->string('ACPs_5')->nullable()->default('');
            $table->string('ACo_5')->nullable()->default('');
            $table->time('ACt_6')->nullable();
            $table->string('ACF_6')->nullable()->default('');
            $table->string('ACPn_6')->nullable()->default('');
            $table->string('ACPs_6')->nullable()->default('');
            $table->string('ACo_6')->nullable()->default('');
            $table->time('ACt_7')->nullable();
            $table->string('ACF_7')->nullable()->default('');
            $table->string('ACPn_7')->nullable()->default('');
            $table->string('ACPs_7')->nullable()->default('');
            $table->string('ACo_7')->nullable()->default('');
            $table->time('ACt_8')->nullable();
            $table->string('ACF_8')->nullable()->default('');
            $table->string('ACPn_8')->nullable()->default('');
            $table->string('ACPs_8')->nullable()->default('');
            $table->string('ACo_8')->nullable()->default('');
            $table->time('ACt_9')->nullable();
            $table->string('ACF_9')->nullable()->default('');
            $table->string('ACPn_9')->nullable()->default('');
            $table->string('ACPs_9')->nullable()->default('');
            $table->string('ACo_9')->nullable()->default('');
            $table->time('ACt_10')->nullable();
            $table->string('ACF_10')->nullable()->default('');
            $table->string('ACPn_10')->nullable()->default('');
            $table->string('ACPs_10')->nullable()->default('');
            $table->string('ACo_10')->nullable()->default('');
        });
    }

    public function down(): void{
        Schema::connection('patient_db')->dropIfExists('Colonoscopy');
    }
};
