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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('institution_id');
            $table->unsignedBigInteger('class_id');
            $table->timestamps();

            $table->unsignedBigInteger( 'users_id' )->nullable();
            $table->foreign( 'users_id' )->references( 'id' )->on( 'users' );
            $table->foreign('institution_id')->references('id')->on('institutions');
            $table->foreign('class_id')->references('id')->on('classes');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
