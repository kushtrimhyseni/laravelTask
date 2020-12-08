<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->index();
            //$table->foreign('user_id')->references('id')->on('users');
            $table->string('title' ,255)->nullable();
            $table->date('publish_date')->nullable();
            $table->boolean('is_publish');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
            Schema::table('articles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
        
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('articles');
    }
}