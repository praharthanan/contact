<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contacts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 32);
            $table->integer('phone');
            $table->string('address', 512)->nullable();
            $table->string('email', 128);
            $table->timestamps()->nullable();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('contacts');
    }

}
