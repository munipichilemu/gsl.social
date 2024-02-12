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
        Schema::create('ayudas', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignId('beneficiario_id')->constrained();
            $table->integer('social_report_num');
            $table->date('social_report_date');
            $table->integer('amount_given');
            $table->date('given_at');
            $table->boolean('report_submitted')->default(false);
            $table->text('observations')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ayudas');
    }
};
