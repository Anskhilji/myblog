<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInternallinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internallinks', function (Blueprint $table) {
            $table->id();
            $table->string('target')->nullable();
            $table->string('types_of_links')->nullable();
            $table->integer('max_links_in_one_article')->nullable();
            $table->float('fixed_percent')->nullable();
            $table->integer('max_links_limit')->nullable();
            $table->integer('max_links_on_same_anchor_text')->nullable();
            $table->integer('max_links_on_different_anchor_text')->nullable();
            $table->integer('max_links_on_its_own_article')->nullable();
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
        Schema::dropIfExists('internallinks');
    }
}
