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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();        // Tên danh mục
            $table->string('slug', 100)->unique();        // Slug để SEO URL (ví dụ: dien-thoai)
            $table->text('description')->nullable();      // Mô tả ngắn
            $table->string('image')->nullable();          // Ảnh thumbnail danh mục (nếu cần)
            $table->boolean('is_active')->default(true);  // Trạng thái hiển thị
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
