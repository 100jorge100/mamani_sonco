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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200);
            $table->text('descripcion')->nullable();
            $table->foreignId('id_comunidad')
                  ->nullable()
                  ->constrained('comunidads')
                  ->cascadeOnUpdate()
                  ->nullOnDelete(); 
            $table->foreignId('id_recurso')
                  ->nullable()
                  ->constrained('recursos')
                  ->cascadeOnUpdate()
                  ->nullOnDelete(); 
            $table->foreignId('id_empresa')
                  ->nullable()
                  ->constrained('empresas')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();    
            $table->foreignId('id_categoria')
                  ->nullable()
                  ->constrained('categorias')
                  ->cascadeOnUpdate()
                  ->nullOnDelete(); 
            $table->foreignId('id_cronograma')
                  ->nullable()
                  ->constrained('cronogramas')
                  ->cascadeOnUpdate()
                  ->nullOnDelete(); 
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_final')->nullable();
            $table->string('estado', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
