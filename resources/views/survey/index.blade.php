@extends('layouts.app')
@section('content')

<div class="container">
  <h3>People answer with super</h3>
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Answer 1</th>
        <th scope="col">After using the app how likely do you think you became able to distinguish between recyclable and non-recyclable products?</th>
        <th scope="col">How likely would you recommend the app to a friend or colleague?</th>
        <th scope="col">Was it easy to use?</th>
        <th scope="col">How much was this addition useful and easy to use?</th>
        <th scope="col">was there any problem?</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($surveys as $survey)
      @if($survey->type === 'Super')
      <tr>
        <th style="background-color: #212529;color:white" scope="row">{{ $survey->type }}</th>
        <td>{{ $survey->q1 }}</td>
        <td>{{ $survey->q2 }}</td>
        <td>{{ $survey->q3 }}</td>
        <td>{{ $survey->q4 }}</td>
        <td>{{ $survey->q5 }}</td>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
</div>
<hr>
<br><br>
<hr>
<div class="container">
  <h3>People answer with can be better</h3>
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Answer 1</th>
        <th scope="col">Feedback</th>
        <th scope="col">what can we do to improve?</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($surveys as $survey)
      @if($survey->type === 'Can be better')
      <tr>
        <th style="background-color: #212529;color:white" scope="row">{{ $survey->type }}</th>
        <th scope="row">{{ $survey->q6 }}</th>
        <th scope="row">{{ $survey->q7 }}</th>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
</div>
@endsection
