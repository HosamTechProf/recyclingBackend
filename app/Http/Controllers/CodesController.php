<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CodesController extends Controller
{
    public function getBarcodes(Request $request)
    {
    	$code = $request->code;
		$codes = DB::select('select msg from barcodes where code = ?', [$code]);
    	if (count($codes) == 1) {
	    	return response()->json(['status'=>true,'codes'=>$codes]);
    	}else{
	    	return response()->json(['status'=>false]);
    	}
    }
}
