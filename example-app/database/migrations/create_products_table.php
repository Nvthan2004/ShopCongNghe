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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);                     // Tên sản phẩm
            $table->text('description');                     // Mô tả chi tiết
            $table->decimal('price', 10, 2);                 // Giá
            $table->integer('quantity');                     // Số lượng trong kho
            $table->string('image')->nullable();             // Ảnh đại diện
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');     // Thương hiệu
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');   // Loại sản phẩm
            $table->float('rating')->default(0);             // Điểm đánh giá trung bình
            $table->integer('reviews_count')->default(0);    // Số lượt đánh giá
            $table->boolean('is_featured')->default(false);  // Sản phẩm nổi bật?
            $table->enum('status', ['active', 'inactive'])->default('active'); // Trạng thái
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
