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
        Schema::table('areas', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });

        Schema::table('property_specification', function (Blueprint $table) {
            $table->primary(['property_id', 'specification_id']);
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreign('specification_id')->references('id')->on('specifications')->onDelete('cascade');
        });

        Schema::table('property_hotspot', function (Blueprint $table) {
            $table->primary(['property_id', 'hotspot_id']);
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreign('hotspot_id')->references('id')->on('hotspots')->onDelete('cascade');
        });

        Schema::table('properties', function (Blueprint $table) {
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });

        Schema::table('prices', function (Blueprint $table) {
            $table->foreign('price_category_id')->references('id')->on('price_categories')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });


        Schema::table('users',function(Blueprint $table){
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onDelete('cascade');
        });

        Schema::table('specifications', function (Blueprint $table) {
            $table->foreign('specification_category_id')->references('id')->on('specification_categories')->onDelete('cascade');
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
