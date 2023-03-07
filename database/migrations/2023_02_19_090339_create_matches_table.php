<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id')->constrained('tournaments')->onDeleted('cascade')->onUpdate('cascade');
            $table->foreignId('team1_id')->constrained('teams')->onDeleted('cascade')->onUpdate('cascade');
            $table->foreignId('team2_id')->constrained('teams')->onDeleted('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->timestamp('start_time')->useCurrent();
            $table->timestamp('end_time')->useCurrent();
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
        Schema::dropIfExists('matches');
    }
}
