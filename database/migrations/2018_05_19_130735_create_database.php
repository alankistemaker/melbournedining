<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            //$table->unsignedInteger('country_id')->unique();
            $table->unsignedInteger('country_id');
            $table->index('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('phone');
            $table->string('address1');
            $table->string('address2');
            $table->string('suburb');
            $table->char('state', 3);
            $table->integer('numberofseats');
            $table->unsignedInteger('country_id');
            //$table->unsignedInteger('country_id')->unique();
            $table->unsignedInteger('category_id');
            //$table->unsignedInteger('category_id')->unique();
            $table->index('country_id');
            $table->index('category_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->timestamps();
            //$table->unsignedInteger('restaurant_id')->unique();
            $table->unsignedInteger('restaurant_id');
            //$table->unsignedInteger('user_id')->unique();
            $table->unsignedInteger('user_id');
            $table->index('user_id');
            $table->index('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('categories');                    
            $table->foreign('user_id')->references('id')->on('users');                    
        });
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->timestamps();
            //$table->unsignedInteger('post_id')->unique();
            $table->unsignedInteger('post_id');
            //$table->unsignedInteger('user_id')->unique();
            $table->unsignedInteger('user_id');
            $table->index('user_id');
            $table->index('post_id');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::create('role_user', function (Blueprint $table) {
            //$table->unsignedInteger('user_id')->unique();
            $table->unsignedInteger('user_id');
            //$table->unsignedInteger('role_id')->unique();
            $table->unsignedInteger('role_id');
            $table->index('user_id');
            $table->index('role_id');
            // $table->primary(['user_id', 'role_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::dropIfExists('countries');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('restaurants');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('role_user');
    }
}
?>
