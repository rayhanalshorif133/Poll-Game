<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poll_id')->constrained('polls')->onDeleted('cascade')->onUpdate('cascade');
            $table->foreignId('account_id')->constrained('accounts')->onDeleted('cascade')->onUpdate('cascade');
            $table->foreignId('match_id')->constrained('matches')->onDeleted('cascade')->onUpdate('cascade');
            $table->string('given_answer');
            $table->integer('point');
            $table->string('answer_status')->enm(['correct', 'wrong'])->default('wrong');
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('scores');
    }
}
