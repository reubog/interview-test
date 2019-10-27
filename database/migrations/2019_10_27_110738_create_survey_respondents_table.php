<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class SurveyRespondentsDatabaseCreation
 *
 * Class to automatically create the survey_respondents table needed for the application using
 * the command 'php artisan migrate'
 *
 */
class CreateSurveyRespondentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_respondents', function (Blueprint $table) {
            $table->bigIncrements('RespondentID');
            $table->text('FirstName');
            $table->text('LastName');
            $table->text('Address');
            $table->text('E-mail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_respondents');
    }
}
