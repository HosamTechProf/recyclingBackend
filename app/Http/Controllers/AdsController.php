<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\SellerAds;
use App\ConsumerAds;
use App\User;

class AdsController extends Controller
{
    public function addAd(Request $request)
    {
    	$userId = Auth::user()->id;
    	if ($request->type === 'Seller') {
	        $ad = new SellerAds;
	        $ad->name = $request->name;
	        $ad->desc = $request->desc;
	        $ad->price = $request->price;
	        $ad->user_id = $userId;

	        $image = $request->image;
	        if ($image == null) {
	          $png_url = 'ad.png';
	          $ad->image = $png_url;
	          $ad->save();
	          return response()->json(['status'=>true]);
	        }else{
	          $image = substr($image, strpos($image, ",")+1);
	          $data = base64_decode($image);
	          $png_url = "ad-".time().".png";
	          $path = public_path().'/img/ads/' . $png_url;
	          $ad->image = $png_url;
	          $ad->save();
	          file_put_contents($path, $data);
	          return response()->json(['status'=>true]);
	        }
    	}else{
	        $ad = new ConsumerAds;
	        $ad->name = $request->name;
	        $ad->desc = $request->desc;
	        $ad->price = $request->price;
	        $ad->user_id = $userId;

	        $image = $request->image;
	        if ($image == null) {
	          $png_url = 'ad.png';
	          $ad->image = $png_url;
	          $ad->save();
	          return response()->json(['status'=>true]);
	        }else{
	          $image = substr($image, strpos($image, ",")+1);
	          $data = base64_decode($image);
	          $png_url = "ad-".time().".png";
	          $path = public_path().'/img/ads/' . $png_url;
	          $ad->image = $png_url;
	          $ad->save();
	          file_put_contents($path, $data);
	          return response()->json(['status'=>true]);
	        }
    	}
    }

    public function getads($type)
    {
    	if ($type === 'Seller') {
    		$ads = ConsumerAds::all();
	        return response()->json($ads);
    	}else{
    		$ads = SellerAds::all();
	        return response()->json($ads);
    	}
    }

    public function getad($type, $id)
    {
    	if ($type === 'Seller') {
    		$ad = ConsumerAds::find($id);
			$user = $ad->user;
	        return response()->json($ad);
	    }else{
    		$ad = SellerAds::find($id);
			$user = $ad->user;
	        return response()->json($ad);
    	}
    }

    public function getMyAds()
    {
    	$user = Auth::user();
    	if ($user->type === 'Consumer') {
    		$myAds = $user->consumerAds;
    		return $myAds;
    	}
		$myAds = $user->sellerAds;
		return $myAds;
    }

}
