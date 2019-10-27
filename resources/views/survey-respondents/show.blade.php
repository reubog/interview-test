@extends('survey-respondents.layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('survey-respondents.index') }}"> Back to list</a>
            </div>
            <h2 class="card-title">Survey Respondent Details</h2>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Respondent ID:</strong>
                        {{ $survey_respondent->RespondentID }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>First Name:</strong>
                        {{ $survey_respondent->FirstName }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Last Name:</strong>
                        {{ $survey_respondent->LastName }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Address:</strong>
                        {{ $survey_respondent->Address }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>E-mail:</strong>
                        {{ $survey_respondent->email }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <a class="btn btn-primary" href="{{ route('survey-respondents.edit',$survey_respondent->RespondentID) }}">Edit</a>
                </div>
            </div>
        </div>
    </div>

@endsection
