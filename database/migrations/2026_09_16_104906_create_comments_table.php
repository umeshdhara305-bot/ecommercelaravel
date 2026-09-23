<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('blog_id')
                  ->constrained('blogs')
                  ->cascadeOnDelete();

            $table->string('name');
            $table->string('email');
            $table->string('website')->nullable();
            $table->text('message');

            $table->boolean('approved')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};