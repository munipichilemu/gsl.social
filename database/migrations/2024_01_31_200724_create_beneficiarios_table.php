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
            $table->string('nombres')->nullable(false);
            $table->string('apellido_1')->nullable(false);
            $table->string('apellido_2')->nullable(false);
            $table->string('direccion');
            $table->integer('telefono');
            $table->string('nacionalidad', 2);
            $table->text('anotaciones');
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
