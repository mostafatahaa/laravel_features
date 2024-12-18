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
        Schema::create('coupon_usage', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->string('coupon_code', 100);
            $table->unsignedBigInteger('user_id');
            $table->timestamp('used_at')->nullable();

            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unique(['coupon_id', 'user_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_usage');
    }
};
