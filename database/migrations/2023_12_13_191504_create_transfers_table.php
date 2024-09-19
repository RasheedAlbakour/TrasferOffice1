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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('offices')->onDelete('cascade');
            $table->foreignId('receiver_id')->constrained('offices')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->timestamp('transfer_date');
            $table->string('person_receiving')->nullable();
            $table->string('status')->default('pending'); // حقل الحالة
            $table->string('transfer_code')->unique()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
