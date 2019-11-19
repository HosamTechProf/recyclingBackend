<?php
use App\ConsumerAds;
use App\ConsumerRef;
use App\SellerAds;
use App\User;
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


Route::get('/', 'SurveyController@surveyResults');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function () {
	// $user = User::find(4);
	// $test = array();
	// $test2 = count($user->consumerAds);
	// for ($i=0; $i < $test2 ; $i++) {
	// 	// $user->consumerAds[$i]['id'];
	// 	array_push($test, $user->consumerAds[$i]['id']);
	// }
	// $ads = ConsumerRef::whereIn('ad_id' ,$test)->get();
	// $test3 = count($ads);
	// $testt = array();
	// for ($i=0; $i < $test3 ; $i++) {
	// 	// $user->consumerAds[$i]['id'];
	// 	array_push($testt, $ads[$i]['id']);
	// }
	// // return $testt;
	// return ConsumerAds::whereIn('id' ,$test)->get();

	$user = User::find(4);
	$test = array();
	foreach ($user->consumerAdsRef as $testt) {
		array_push($test, $testt->pivot->user_id);
	}
	// return $user->consumerAdsRef;
	$my_data=array();
	 foreach($test as $id){
		 $my = User::where('id',$id)->first();
	     if($my){
	       array_push($my_data,$my);
	     }
	 }

	 return $user->consumerAdsRef;
	 // return User::find($user->consumerAdsRef->find(1)->pivot->user_id);
});
