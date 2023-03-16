<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sports_id')->constrained('sports')->onDeleted('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('icon');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('days')->nullable();
            $table->string('day')->nullable();
            $table->longText('description')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('banner')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('tournaments');
    }
}
