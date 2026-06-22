<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->string('auteur');
            $table->string('editeur');
            $table->date('dateEdition');
            $table->integer('NbreExemplaire');
            $table->string('book_img')->nullable();
            $table->string('price');
            
            // Foreign key for the category
            $table->foreignId('categorie_id')
                ->constrained('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};