<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('title');
	        $table->string('image')->nullable();
            $table->integer('discount');
	        $table->integer('price');
            $table->integer('total');
            $table->longText('desc');
	        $table->decimal('size', 8, 2);
            $table->foreignId('spec_id')->constrained('specs')->onDelete('cascade');
            $table->string('developer');
            $table->string('publisher');
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
        Schema::dropIfExists('games');
    }
}
