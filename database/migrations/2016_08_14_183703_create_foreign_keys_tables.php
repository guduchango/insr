<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeysTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('section_id')->references('id')->on('sections');
        });

        Schema::table('phones', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });

        Schema::table('socials', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });

        Schema::table('companies_categories', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('category_id')->references('id')->on('categories');
        });


        Schema::table('departments', function (Blueprint $table) {
            $table->foreign('province_id')->references('id')->on('provinces');
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign('companies_user_id_foreign');
            $table->dropForeign('companies_province_id_foreign');
            $table->dropForeign('companies_department_id_foreign');
            $table->dropForeign('companies_section_id_foreign');
        });

        Schema::table('phones', function (Blueprint $table) {
            $table->dropForeign('phones_company_id_foreign');
        });

        Schema::table('socials', function (Blueprint $table) {
            $table->dropForeign('socials_company_id_foreign');
        });

        Schema::table('companies_categories', function (Blueprint $table) {
            $table->dropForeign('companies_categories_company_id_foreign');
            $table->dropForeign('companies_categories_category_id_foreign');
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign('departments_province_id_foreign');
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->dropForeign('sections_department_id_foreign');
        });

    }
}
