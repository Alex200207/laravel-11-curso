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
    {# crear tabla de usuarios
        # blueprint es una clase que nos permite crear tablas y $table es una instancia de esa clase
        Schema::create('users', function (Blueprint $table) {
            $table->id();# 
            $table->string('name');
            $table->string('email')->unique(); # decimos que el email es unico
            $table->timestamp('email_verified_at')->nullable(); # timestamp para verificar el email y que pueda ser nulo
            $table->string('password');# contraseña
            $table->rememberToken(); # token para recordar la sesion
            $table->timestamps(); # cerar dos columnas created_at y updated_at que son para saber cuando se creo y cuando se actualizo
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); # email como clave primaria
            $table->string('token');
            $table->timestamp('created_at')->nullable();# solo crea la columna created_at q es para saber cuando se creo
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();# foreignId es para crear una clave foranea y index es para crear un indice esto 
            # es para poder buscar mas rapido
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index(); # 
        });
    Schema::create('category', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
