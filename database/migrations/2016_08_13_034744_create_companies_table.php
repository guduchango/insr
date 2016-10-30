<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('slogan')->nullable();
            $table->string('email');
            $table->string('url');
            $table->boolean('logo_status')->default(false);
            $table->string('description')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('province_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->timestamps();

            $table->unique('name');
            $table->unique('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::drop('companies');
    }
}
