<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('isbn')->nullable();
            $table->smallInteger('page_count');
            $table->dateTimeTz('published_date')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->enum('status', ['PUBLISH', 'MEAP']);
            $table->json('categories');
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
        Schema::dropIfExists('books');
    }
}
