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
        Schema::create('hotesses', function (Blueprint $table) {
            $table->id();
            $table->string('nomhot')->nullable(false);
            $table->string('telhot')->nullable(true);
            $table->string('maihot')->nullable(true);
            $table->string('adrhot')->nullable(true);
            $table->string('imghot')->nullable(true);
            $table->text('deshot')->nullable(true);
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotesses');
    }
};
