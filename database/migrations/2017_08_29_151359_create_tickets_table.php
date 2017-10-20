<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('date');
            $table->string('amount');
            $table->string('img')->nullable();
            $table->integer('group_id');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('ticket_user', function (Blueprint $table) {
            $table->integer('ticket_id');
            $table->integer('user_id');
            $table->integer('amount');
            $table->primary(['user_id', 'ticket_id']);
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('tickets');
    }
}
