<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->time('time');
            $table->timestamps();
        });

        Schema::create('appointments_translations', function (Blueprint $table) {
            $table->string('lang_code');
            $table->foreignId('appointments_id');
            $table->string('name', 255)->nullable();

            $table->primary(['lang_code', 'appointments_id'], 'appointments_translations_primary');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('appointments_translations');
    }
};
