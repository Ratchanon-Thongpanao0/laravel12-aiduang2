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
        Schema::create('ratchanon35', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('int01')->nullable();
            $table->float('float02')->nullable();
            $table->string('string03')->nullable();
            $table->date('date04')->nullable();
            $table->text('text05')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratchanon35');
    }
};
