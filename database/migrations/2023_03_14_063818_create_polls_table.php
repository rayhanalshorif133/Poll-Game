<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->constrained('matches')->onDeleted('cascade')->onUpdate('cascade');
            $table->string('question');
            $table->json('image')->nullable();
            $table->string('option_1');
            $table->string('option_2');
            $table->string('option_3')->nullable();
            $table->string('option_4')->nullable();
            $table->string('status')->default('active');
            $table->longText('description')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDeleted('cascade')->onUpdate('cascade');
            $table->foreignId('updated_by')->constrained('users')->onDeleted('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('polls');
    }
}
