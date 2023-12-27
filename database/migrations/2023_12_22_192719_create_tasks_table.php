<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        //!!Creación de la tabla TASKS */
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            //*Se define las llaves foraneas mencionando constrained, el cual asume la relación que se está llevando acabo
            $table->foreignId('company_id')->constrained(table:'companies');
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->string('description');
            //*Se declara tipo boolean para identificar el estado la tarea con 1 y 0
            $table->boolean('is_completed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
