<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::connection('patient_db')->create('Tumor_maker', function (Blueprint $table) {  
            $table->string('basic_information_id');
            $table->foreign('basic_information_id')->references('Chart')->on('Basic_information')->onDelete('cascade');
            $table->date('Td_1')->nullable();
            $table->string('TC_1')->nullable()->default('');
            $table->string('T125_1')->nullable()->default('');
            $table->string('T199_1')->nullable()->default('');
            $table->string('To_1')->nullable()->default('');
            $table->date('Td_2')->nullable();
            $table->string('TC_2')->nullable()->default('');
            $table->string('T125_2')->nullable()->default('');
            $table->string('T199_2')->nullable()->default('');
            $table->string('To_2')->nullable()->default('');
            $table->date('Td_3')->nullable();
            $table->string('TC_3')->nullable()->default('');
            $table->string('T125_3')->nullable()->default('');
            $table->string('T199_3')->nullable()->default('');
            $table->string('To_3')->nullable()->default('');
            $table->date('Td_4')->nullable();
            $table->string('TC_4')->nullable()->default('');
            $table->string('T125_4')->nullable()->default('');
            $table->string('T199_4')->nullable()->default('');
            $table->string('To_4')->nullable()->default('');
            $table->date('Td_5')->nullable();
            $table->string('TC_5')->nullable()->default('');
            $table->string('T125_5')->nullable()->default('');
            $table->string('T199_5')->nullable()->default('');
            $table->string('To_5')->nullable()->default('');
            $table->date('Td_6')->nullable();
            $table->string('TC_6')->nullable()->default('');
            $table->string('T125_6')->nullable()->default('');
            $table->string('T199_6')->nullable()->default('');
            $table->string('To_6')->nullable()->default('');
            $table->date('Td_7')->nullable();
            $table->string('TC_7')->nullable()->default('');
            $table->string('T125_7')->nullable()->default('');
            $table->string('T199_7')->nullable()->default('');
            $table->string('To_7')->nullable()->default('');
            $table->date('Td_8')->nullable();
            $table->string('TC_8')->nullable()->default('');
            $table->string('T125_8')->nullable()->default('');
            $table->string('T199_8')->nullable()->default('');
            $table->string('To_8')->nullable()->default('');
            $table->date('Td_9')->nullable();
            $table->string('TC_9')->nullable()->default('');
            $table->string('T125_9')->nullable()->default('');
            $table->string('T199_9')->nullable()->default('');
            $table->string('To_9')->nullable()->default('');
            $table->date('Td_10')->nullable();
            $table->string('TC_10')->nullable()->default('');
            $table->string('T125_10')->nullable()->default('');
            $table->string('T199_10')->nullable()->default('');
            $table->string('To_10')->nullable()->default('');
        });
    }

    public function down(): void{
        Schema::connection('patient_db')->dropIfExists('Tumor_maker');
    }
};
