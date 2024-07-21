<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::connection('user_db')->create('employee', function (Blueprint $table) {
            $table->string('username'); // 使用者名稱
            $table->string('account')->unique(); // 帳號
            $table->string('password'); // 密碼
            $table->timestamps();
        });

        Schema::connection('user_db')->create('actions', function (Blueprint $table) {
            $table->string('username');
            $table->string('action');
            $table->timestamps();
        });
    }
    
    

    public function down(): void{
        Schema::connection('user_db')->dropIfExists('employee');
        Schema::connection('user_db')->dropIfExists('actions');
    }
};
