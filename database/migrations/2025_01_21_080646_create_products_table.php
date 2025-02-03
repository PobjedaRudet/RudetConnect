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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('Naziv');
            $table->string('Tip');
            $table->string('SkraceniNaziv');
            $table->string('JedinicaMjere');
            $table->string('Code');
            $table->decimal('UoM_meter', 8, 2);
            $table->decimal('UsporenjeMs', 8, 2);
            $table->string('UNNumber');
            $table->string('HazardClass');
            $table->string('CEMarkNumber');
            $table->string('NumeraProizvoda');
            $table->string('VrstaProvodnika');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
