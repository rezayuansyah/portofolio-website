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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
        ->constrained('users')
        ->cascadeOnDelete();

    $table->string('author_name');
    $table->string('author_role')->nullable();
    $table->string('author_company')->nullable();
    $table->string('author_photo')->nullable();

    $table->text('content');

    $table->boolean('is_approved')->default(false);
    $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
