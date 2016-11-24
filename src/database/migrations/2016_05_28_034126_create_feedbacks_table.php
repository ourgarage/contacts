<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Ourgarage\Contacts\Models\Feedback;

class CreateFeedbacksTable extends Migration
{
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('name');
            $table->text('message');
            $table->integer('status')->default(Feedback::STATUS_NOT_READED);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('feedbacks');
    }
}
