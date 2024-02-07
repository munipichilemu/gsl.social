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
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->rut()->index();
            $table->string('names')->nullable(false);
            $table->string('lastname_1')->nullable(false);
            $table->string('lastname_2')->nullable(false);
            $table->string('address')->nullable();
            $table->integer('phone')->nullable();
            $table->string('nationality', 2);
            $table->text('annotations')->nullable();
            $table->string('full_name')->virtualAs("names || ' ' || lastname_1 || ' ' || lastname_2");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');
    }
};
