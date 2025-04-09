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
        Schema::create('categorys', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();        // Tên danh mục
            $table->string('slug', 100)->unique();        // Slug để SEO URL (ví dụ: dien-thoai)
            $table->string('image')->nullable();          // Ảnh thumbnail danh mục (nếu cần)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorys');
    }
};
