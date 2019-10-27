@extends('survey-respondents.layout')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('survey-respondents.create') }}"> Create New Survey Respondent</a>
            </div>
            <h2 class="card-title">Survey Respondents</h2>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif



            <div class="row">
                <div class="col-lg-12 margin-tb">

                <div class="float-right">
                    <p class="card-text">Total number of Survey Respondents: {!! $survey_respondents->total() !!}</p>
                </div>
                <div class="">

                </div>
                {{ $survey_respondents->links() }}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <table class="table table-bordered">
                        <tr>
                            <th>RespondentID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>E-mail</th>
                            <th width="280px">Actions</th>
                        </tr>
                        @foreach ($survey_respondents as $survey_respondent)
                            <tr>
                                <td>{{ $survey_respondent->RespondentID }}</td>
                                <td>{{ $survey_respondent->FirstName }}</td>
                                <td>{{ $survey_respondent->LastName }}</td>
                                <td>{{ $survey_respondent->Address }}</td>
                                <td>{{ $survey_respondent->email }}</td>
                                <td>
                                    <form action="{{ route('survey-respondents.destroy',$survey_respondent->RespondentID) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-info" href="{{ route('survey-respondents.show',$survey_respondent->RespondentID) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('survey-respondents.edit',$survey_respondent->RespondentID) }}">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete now</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            {!! $survey_respondents->links() !!}
        </div>
    </div>


@endsection
