@extends('survey-respondents.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('survey-respondents.index') }}"> Back to list</a>
            </div>
            <h2 class="card-title">Edit Survey Respondent</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('survey-respondents.update',$survey_respondent->RespondentID) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>First Name:</strong>
                            <input type="text" name="FirstName" value="{{ $survey_respondent->FirstName }}" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            <input type="text" name="LastName" value="{{ $survey_respondent->LastName }}" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Address:</strong>
                            <input type="text" name="Address" value="{{ $survey_respondent->Address }}" class="form-control" placeholder="Address">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>E-mail:</strong>
                            <input type="text" name="E-mail" value="{{ $survey_respondent->email }}" class="form-control" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
