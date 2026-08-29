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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uploaded_by')
        ->nullable()
        ->constrained('users')
        ->nullOnDelete();

    $table->string('file_name');
    $table->string('file_path');
    $table->string('mime_type');
    $table->unsignedBigInteger('size');

    $table->string('mediable_type')->nullable();
    $table->unsignedBigInteger('mediable_id')->nullable();

    $table->index([
        'mediable_type',
        'mediable_id',
    ]);

    $table->timestamp('created_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
