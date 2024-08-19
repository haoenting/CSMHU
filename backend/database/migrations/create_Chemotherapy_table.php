<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::connection('patient_db')->create('Chemotherapy', function (Blueprint $table) {  
            $table->string('basic_information_id');
            $table->foreign('basic_information_id')->references('Chart')->on('Basic_information')->onDelete('cascade');
            $table->date('start_1')->nullable();
            $table->date('end_1')->nullable();
            $table->date('start_2')->nullable();
            $table->date('end_2')->nullable();
            $table->date('start_3')->nullable();
            $table->date('end_3')->nullable();
            $table->date('start_4')->nullable();
            $table->date('end_4')->nullable();
            $table->date('start_5')->nullable();
            $table->date('end_5')->nullable();
            $table->date('start_6')->nullable();
            $table->date('end_6')->nullable();
            $table->date('start_7')->nullable();
            $table->date('end_7')->nullable();
            $table->date('start_8')->nullable();
            $table->date('end_8')->nullable();
            $table->date('start_9')->nullable();
            $table->date('end_9')->nullable();
            $table->date('start_10')->nullable();
            $table->date('end_10')->nullable();
        });
    }

    public function down(): void{
        Schema::connection('patient_db')->dropIfExists('Chemotherapy');
    }
};
