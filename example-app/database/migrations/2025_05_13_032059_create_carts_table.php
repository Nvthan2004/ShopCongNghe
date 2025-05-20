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
        Schema::create('carts', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user'); // Khóa ngoại cho user
            $table->unsignedBigInteger('id_product'); // Khóa ngoại cho product
            $table->integer('soluong'); // Số lượng sản phẩm
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
