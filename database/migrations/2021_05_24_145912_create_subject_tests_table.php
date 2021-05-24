<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_tests', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->integer('question_id'); // could have been foreign key if i had stored test questions in the
            $table->string('answer');
            $table->string('subject_id')->references('id')->on('subjects');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_tests');
    }
}
