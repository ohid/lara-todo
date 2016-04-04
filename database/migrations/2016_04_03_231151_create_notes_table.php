<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');
            $table->timestamps();
        });

        Schema::create('note_todo', function (Blueprint $table) {
            $table->integer('note_id')->unsigned();
            $table->foreign('note_id')
                    ->references('id')
                    ->on('notes');

            $table->integer('todo_id')->unsigned();           
            $table->foreign('todo_id')
                    ->references('id')
                    ->on('todos');
                    
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
        Schema::drop('note_todo');
        Schema::drop('notes');
    }
}
