<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            
            $table->string('title');
            $table->text('detail');
            $table->string('image');

            $table->boolean('is_active')->default(1);
            $table->integer('sort_id')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->foreign("created_by")->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
