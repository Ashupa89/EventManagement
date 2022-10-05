<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->text('event_title');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('recurrence')->comment('1: Repeat , 2: Repeat on the');
            $table->integer('repeat')->nullable();
            $table->integer('every')->nullable();
            $table->integer('repeatOn')->nullable();
            $table->integer('repeatWeek')->nullable();
            $table->integer('repeatMonth')->nullable();
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
        Schema::dropIfExists('events');
    }
};
