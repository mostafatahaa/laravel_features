<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->smallInteger('id');
            $table->string('code', 100);
            $table->decimal('discount', 8, 2);
            $table->enum('discount_type', ['percent', 'value'])->default('percent');
            $table->timestamp('expired_at')->nullable();
            $table->boolean('is_for_all_users')->default(true);
            $table->boolean('notify_all_users')->default(true);
            $table->integer('number_of_use')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
