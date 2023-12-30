<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appearances', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('number');
            $table->string('main_logo');
            $table->string('footer_logo');
            $table->string('favicon');
            $table->string('description')->nullable();
            $table->string('keyword')->nullable();
            $table->string('head_script')->nullable();
            $table->string('body_script')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appearances');
    }
};
