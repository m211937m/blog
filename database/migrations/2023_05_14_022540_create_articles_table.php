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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyText('img');
            $table->Text('paragraph_1');
            $table->Text('paragraph_2');
            $table->Text('paragraph_3');
            $table->tinyText('img_1');
            $table->tinyText('img_2');
            $table->foreignId('categore_id')->constrained('categores')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('publisher_id')->constrained('publishers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('type')->length(1)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
