<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')
                ->constrained('players')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('word');
            $table->json('type_sequence');
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
        Schema::dropIfExists('type_logs');
    }
}
