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
        Schema::create('boletas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('numero')->unique();
            //Se me olvido el campo proveedor en esta migracion, asi que usare "php artisan make:migration add_proveedor_to_boletas_table --table=boletas" para agregar el campo despues
            $table->string('proveedor');
            $table->decimal('monto', 10, 2);
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boletas');
    }
};
