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
            $table->integer('day')->default(1)->nullable();
            $table->string('question');
            $table->json('images')->nullable();
            $table->string('option_type')->default('text')->comment('text, image')->nullable();
            $table->string('option_1')->nullable();
            $table->string('option_2')->nullable();
            $table->string('option_3')->nullable();
            $table->string('option_4')->nullable();
            $table->string('answer')->nullable();
            $table->integer('point')->default(0)->nullable();
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
