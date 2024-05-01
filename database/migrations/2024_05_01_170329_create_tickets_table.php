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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            //FOREIGN KEY KE TABLE ACARA
            $table->foreignId('acara_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->double('harga')->default(0);
            $table->integer('kuantitas')->default(0);
            $table->integer('max_buy')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
