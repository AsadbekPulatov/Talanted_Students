<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenceDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('patronymic');
            $table->date('date');
            $table->string('text');
            $table->date('birthday');
            $table->string('birthday_location');
            $table->string('nation');
            $table->string('party');
            $table->string('info');
            $table->string('graduated');
            $table->string('specialist');
            $table->string('academic_degree');
            $table->string('academic_title');
            $table->string('language');
            $table->string('state_award');
            $table->string('party_member');
            $table->text('family');
            $table->text('fullname');
            $table->text('fbirthday');
            $table->text('fbirthday_location');
            $table->text('workplace');
            $table->text('location');
            $table->string('filelocation');
            $table->string('imglocation')->nullable();
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
        Schema::dropIfExists('reference_documents');
    }
}
