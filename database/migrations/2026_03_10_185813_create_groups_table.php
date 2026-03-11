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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // beginner, intermediate, advanced
            $table->timestamps();
        });

        Schema::create('course_group', function (Blueprint $table) {
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('group_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['course_id', 'group_id']);
            $table->primary(['course_id', 'group_id']);
        });

        // Añadir group_id a users ahora que la tabla groups existe
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('group_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['group_id']);
            $table->dropColumn('group_id');
        });

        Schema::dropIfExists('course_group');
        Schema::dropIfExists('groups');
    }
};