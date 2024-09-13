<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('properties', function(Blueprint $table) {
            $table->string('size')->nullable();
            $table->integer('number_of_baths')->default(1);
            $table->integer('number_of_beds')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('properties', function(Blueprint $table) {
            $table->dropColumn('size');
            $table->dropColumn('number_of_baths');
            $table->dropColumn('number_of_beds');
        });
    }

};
