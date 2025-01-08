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
        Schema::create('prestataires', function (Blueprint $table) {
            $table->id();
            $table->string('nompre')->nullable(false);
            $table->string('telpre')->nullable(true);
            $table->string('maipre')->nullable(true);
            $table->string('adrpre')->nullable(true);
            $table->text('despre')->nullable(true);
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
        Schema::dropIfExists('prestataires');
    }
};
