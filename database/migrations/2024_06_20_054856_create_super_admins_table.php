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
        Schema::create( 'super_admins', function ( Blueprint $table ) {
            $table->id();

            $table->unsignedBigInteger( 'users_id' )->nullable();
            $table->foreign( 'users_id' )->references( 'id' )->on( 'users' );
            $table->timestamps();
        } );

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists( 'super_admins' );
    }
};
