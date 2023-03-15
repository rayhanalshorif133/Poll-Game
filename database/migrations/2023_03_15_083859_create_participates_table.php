<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->onDeleted('cascade')->onUpdate('cascade');
            $table->foreignId('tournament_id')->constrained('tournaments')->onDeleted('cascade')->onUpdate('cascade');
            $table->integer('point')->nullable();
            $table->string('total_days')->nullable();
            $table->string('days')->nullable();
            $table->string('role')->default('player');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('participates');
    }
}
