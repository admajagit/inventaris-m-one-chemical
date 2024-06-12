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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('image_url', 255)->nullable();
            $table->text('description')->nullable(false);
            $table->integer('quantity');
            $table->decimal('price', 10, 3);
            $table->string('category_name', 50);
            $table->timestamps();

            // Definisikan foreign key setelah semua kolom didefinisikan
            $table->foreign('category_name')->references('name')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
