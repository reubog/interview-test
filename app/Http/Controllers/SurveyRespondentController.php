<?php

namespace App\Http\Controllers;

use App\SurveyRespondent;
use Illuminate\Http\Request;

class SurveyRespondentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $survey_respondents = SurveyRespondent::paginate(10);

        return view('survey-respondents.index',compact('survey_respondents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('survey-respondents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'Address' => 'required',
            'E-mail' => 'required|email:filter',
        ]);

        $newRecord = SurveyRespondent::create($request->all());

        return redirect()->route('survey-respondents.show', $newRecord->RespondentID)
            ->with('success','Survey Respondent created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SurveyRespondent  $survey_respondent
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyRespondent $survey_respondent)
    {
        return view('survey-respondents.show',compact('survey_respondent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SurveyRespondent  $survey_respondent
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyRespondent $survey_respondent)
    {
        return view('survey-respondents.edit',compact('survey_respondent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SurveyRespondent  $survey_respondent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyRespondent $survey_respondent)
    {
        $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'Address' => 'required',
            'E-mail' => 'required|email:filter'
        ]);

        $survey_respondent->update($request->all());

        return redirect()->route('survey-respondents.show', $survey_respondent->RespondentID)
            ->with('success','Survey Respondent updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SurveyRespondent  $survey_respondent
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyRespondent $survey_respondent)
    {
        $survey_respondent->delete();

        return redirect()->route('survey-respondents.index')
            ->with('success','Survey Respondent deleted successfully');
    }
}
