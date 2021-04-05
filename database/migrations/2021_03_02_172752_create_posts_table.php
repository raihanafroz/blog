<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->id();
      $table->string('u_id', 30)->unique();
      $table->foreignId('author_id')->constrained('users');
      $table->foreignId('category_id')->constrained();
      $table->string('title');
      $table->integer('views')->default(0);
      $table->integer('like')->default(0);
      $table->integer('dislike')->default(0);
      $table->longText('body');
      $table->enum('status', ['active', 'inactive'])->default('active');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('posts');
  }
}
