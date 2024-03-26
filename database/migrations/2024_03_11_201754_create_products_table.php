<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('producto', 150);
            $table->text('descripcion');
            $table->string('categoria', 50);
            $table->integer('stock')->default(0);
            $table->boolean('status')->default(1);
            $table->string('imagen', 500)->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');

            // php artisan migrate --path=app/database/migrations/2024_03_11_201754_create_products_table
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
