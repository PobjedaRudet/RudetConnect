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
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserId');
            $table->dateTime('DatumOdobravanja');
            $table->unsignedBigInteger('ProductionOrderId');
            $table->foreign('ProductionOrderId')->references('id')->on('production_orders')->onDelete('cascade');
            $table->string('Komentar', 255)->nullable();
            $table->foreign('UserId')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
