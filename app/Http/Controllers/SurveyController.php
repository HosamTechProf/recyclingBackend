<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function addAnswer(Request $request)
    {
        $user = Auth::user();
    	$input = $request->all();
    	$input['user_id'] = $user->id;
    	Survey::create($input);
    	return response()->json(['status'=>true]);
    }

    public function surveyResults()
    {
    	$surveys = Survey::all();
    	return view('survey.index', ['surveys'=>$surveys]);
    }
}
