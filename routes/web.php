<?php

use App\SurveyRespondent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Route CRUD controller that handles all survey respondent requests
 */
Route::resource('survey-respondents', 'SurveyRespondentController');

/**
 * Default redirect to Survey Respondents resource
 */
Route::get('/', function () {
    return redirect()->to('survey-respondents');
});
