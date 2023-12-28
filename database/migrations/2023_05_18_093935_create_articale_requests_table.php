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
        Schema::create('articale_requests', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyText('img');
            $table->Text('paragraph_1');
            $table->Text('paragraph_2');
            $table->Text('paragraph_3');
            $table->tinyText('img_1');
            $table->tinyText('img_2');
            $table->tinyInteger('categore_id')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->string('refuse_reason')->nullable();
            $table->foreignId('publisher_id')->constrained('publishers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('article_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articale_requests');
    }
};
