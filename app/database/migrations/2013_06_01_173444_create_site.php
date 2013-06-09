<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSite extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::create('users', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('username', 64)->unique();
            $table->string('password', 64);
            $table->string('email', 64)->unique();
            $table->integer('role_id')->default(1);
            $table->timestamps();
        });

        Schema::create('sections', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('titre')->unique();
			$table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('categories', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('titre');
            $table->integer('section_id')->unsigned();
            $table  ->foreign('section_id')
                    ->references('id')
                    ->on('sections')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('articles', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('titre');
			$table->smallInteger('state')->default(0);
            $table->text('intro');
			$table->text('texte')->nullable();
            $table->integer('categorie_id')->unsigned();
            $table  ->foreign('categorie_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('user_id')->unsigned();
            $table  ->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::table('articles', function($table) {
            $table->dropForeign('articles_categorie_id_foreign');
            $table->dropForeign('articles_user_id_foreign');
        });
        Schema::table('categories', function($table) {
            $table->dropForeign('categories_section_id_foreign');
        });
		Schema::drop('users');
		Schema::drop('sections');
		Schema::drop('categories');
		Schema::drop('articles');
	}

}