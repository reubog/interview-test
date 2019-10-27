<?php

namespace Tests\Unit;

use App\Http\Controllers\SurveyRespondentController;
use App\SurveyRespondent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Tests\TestCase;

class SurveyRespondetControllerTest extends TestCase
{
    /**
     * Test Index functionality
     */
    public function testIndex()
    {
        $controller = new SurveyRespondentController();
        $view = $controller->index();

        // test that the view has valid content
        $this->assertTrue(is_object($view));
        $this->assertEquals(class_basename(View::class), class_basename($view));
    }

    /**
     * Test create functionality
     */
    public function testCreate()
    {
        $controller = new SurveyRespondentController();
        $view = $controller->create();

        // test that the view has valid content
        $this->assertTrue(is_object($view));
        $this->assertEquals(class_basename(View::class), class_basename($view));
    }


    /**
     * Test create functionality
     */
    public function testStore()
    {
        $request = Request::create('/survey-respondents', 'POST',[
            'FirstName'     =>     'adam',
            'LastName'     =>     'andersson',
            'Address'     =>     'Alingsås',
            'E-mail'     =>     'adam.andersson@example.com',
        ]);

        $controller = new SurveyRespondentController();

        // test correct input
        $response = $controller->store($request);
        $this->assertTrue(is_object($response));
        $this->assertEquals(class_basename(RedirectResponse::class), class_basename($response));
    }

    /**
     * Test create functionality
     */
    public function testShow()
    {
        $survey_respondent = new SurveyRespondent();
        $survey_respondent->RespondentID = 5;
        $survey_respondent->FirstName = "adam";
        $survey_respondent->LastName = "andersson";
        $survey_respondent->Address = "Alingsås";
        $survey_respondent->setAttribute("E-mail", "adam.andersson@example.com");

        $controller = new SurveyRespondentController();
        // test correct input
        $view = $controller->show($survey_respondent);
        $this->assertTrue(is_object($view));
        $this->assertEquals(class_basename(View::class), class_basename($view));
    }

    /**
     * Test create functionality
     */
    public function testEdit()
    {
        $survey_respondent = new SurveyRespondent();
        $survey_respondent->RespondentID = 5;
        $survey_respondent->FirstName = "adam";
        $survey_respondent->LastName = "andersson";
        $survey_respondent->Address = "Alingsås";
        $survey_respondent->setAttribute("E-mail", "adam.andersson@example.com");

        $controller = new SurveyRespondentController();
        // test correct input
        $view = $controller->edit($survey_respondent);
        $this->assertTrue(is_object($view));
        $this->assertEquals(class_basename(View::class), class_basename($view));
    }

    /**
     * Problem with this test is that it actually updates the database. To improve testability
     * the database access should not happen in unit tests.
     */
    public function testUpdateAllFieldsPresent()
    {
        $request = Request::create('/survey-respondents', 'POST',[
            'FirstName'     =>     'adam',
            'LastName'     =>     'andersson',
            'Address'     =>     'Alingsås',
            'E-mail'     =>     'adam.andersson@example.com',
        ]);

        $survey_respondent = new SurveyRespondent();
        $survey_respondent->RespondentID = 5;
        $survey_respondent->FirstName = "bertil";
        $survey_respondent->LastName = "bengtsson";
        $survey_respondent->Address = "Borås";
        $survey_respondent->setAttribute("E-mail", "bertil.bengtsson@example.com");

        $controller = new SurveyRespondentController();

        // test correct input
        $response = $controller->update($request, $survey_respondent);
        $this->assertTrue(is_object($response));
        $this->assertEquals(class_basename(RedirectResponse::class), class_basename($response));
    }

    public function testDestroy() {
        $request = Request::create('/survey-respondents', 'POST',[
            'FirstName'     =>     'adam',
            'LastName'     =>     'andersson',
            'Address'     =>     'Alingsås',
            'E-mail'     =>     'adam.andersson@example.com',
        ]);

        $controller = new SurveyRespondentController();

        // create new record for later deletion
        $newRecord = SurveyRespondent::query()->create($request->all());

        $rec = SurveyRespondent::query()->find($newRecord->RespondentID);
        $this->assertNotNull($rec);

        $controller->destroy($rec);
        $rec2 = SurveyRespondent::query()->find($rec->RespondentID);
        $this->assertNull($rec2);
    }

}
