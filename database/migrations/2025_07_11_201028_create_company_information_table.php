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
        Schema::create('company_information', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // company name
            $table->text('description'); // company description
            $table->string('phone'); // contact phone
            $table->string('whatsapp')->nullable(); // whatsapp number
            $table->string('email'); // contact email
            $table->text('address'); // company address
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('snapchat')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_information');
    }
};
