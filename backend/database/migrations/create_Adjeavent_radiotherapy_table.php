<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::connection('patient_db')->create('Adjeavent_radiotherapy', function (Blueprint $table) { 
            $table->string('basic_information_id');
            $table->foreign('basic_information_id')->references('ID')->on('Basic_information')->onDelete('cascade');
            $table->date('s_1')->nullable();
            $table->date('e_1')->nullable();
            $table->string('d_1')->nullable()->default('');
            $table->date('s_2')->nullable();
            $table->date('e_2')->nullable();
            $table->string('d_2')->nullable()->default('');
            $table->date('s_3')->nullable();
            $table->date('e_3')->nullable();
            $table->string('d_3')->nullable()->default('');
            $table->date('s_4')->nullable();
            $table->date('e_4')->nullable();
            $table->string('d_4')->nullable()->default('');
            $table->date('s_5')->nullable();
            $table->date('e_5')->nullable();
            $table->string('d_5')->nullable()->default('');
            $table->date('s_6')->nullable();
            $table->date('e_6')->nullable();
            $table->string('d_6')->nullable()->default('');
            $table->date('s_7')->nullable();
            $table->date('e_7')->nullable();
            $table->string('d_7')->nullable()->default('');
            $table->date('s_8')->nullable();
            $table->date('e_8')->nullable();
            $table->string('d_8')->nullable()->default('');
            $table->date('s_9')->nullable();
            $table->date('e_9')->nullable();
            $table->string('d_9')->nullable()->default('');
            $table->date('s_10')->nullable();
            $table->date('e_10')->nullable();
            $table->string('d_10')->nullable()->default('');
        });
    }

    public function down(): void{
        Schema::connection('patient_db')->dropIfExists('Adjeavent_radiotherapy');
    }
};
