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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('user_id');
            $table->string('post_title');
            $table->string('slug');
            $table->text('post_description');
            $table->string('post_photo')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('published_at');
            $table->timestamps();
            // $table->foreign('category_id')->references('id')->on('categories')->OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
