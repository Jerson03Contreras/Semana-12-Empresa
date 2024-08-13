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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url')->unique();
            $table->timestamps();
        });
        Schema::table('personas',function(Blueprint $table){
            $table->unsignedBigInteger('category_nPerCodigo')->nullable()->after('nPerCodigo');
            $table->foreign('category_nPerCodigo')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personas',function(Blueprint $table){
            $table->dropForeign('personas_category_id_foreign');
            $table->dropColumn('category_nPerCodigo');

        });
        Schema::dropIfExists('categories');
    }
};
