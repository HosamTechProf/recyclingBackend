<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ConsumerRef;
use App\SellerRef;
use App\User;

class BuyingController extends Controller
{
    public function requestAd(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_type = $user->type;
        $ad_id = $request->ad_id;
        $seller_id = $request->seller_id;

        if ($user_type === "Consumer") {
        	$ad = new SellerRef;
        	$ad->user_id = $user_id;
        	$ad->ad_id = $ad_id;
        	$ad->seller_id = $seller_id;
        	$ad->type = 0;
        	$ad->save();
	        return response()->json(['status'=>true]);
        }else{
        	$ad = new ConsumerRef;
        	$ad->user_id = $user_id;
        	$ad->ad_id = $ad_id;
        	$ad->seller_id = $seller_id;
        	$ad->type = 0;
        	$ad->save();
	        return response()->json(['status'=>true]);
        }
    }

    public function getAd(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_type = $user->type;
        $ad_id = $request->ad_id;

        if ($user_type === "Consumer") {
        	$ad = SellerRef::where('user_id', $user_id)->where('ad_id', $ad_id)->get();
        	if (count($ad) >= 1) {
	        	return response()->json(['status'=>'requested','ad'=>$ad['0']['type']]);
        	}else if (count($ad) == 0) {
	        	return response()->json(['status'=>'request']);
        	}
        }else{
        	$ad = ConsumerRef::where('user_id', $user_id)->where('ad_id', $ad_id)->get();
        	if (count($ad) >= 1) {
	        	return response()->json(['status'=>'requested','ad'=>$ad['0']['type']]);
        	}else if (count($ad) == 0) {
	        	return response()->json(['status'=>'request']);
        	}
        }
    }

    public function getRequests()
    {
        $user = Auth::user();
        $type = $user->type;
        if ($type === "Consumer") {
            return $user->consumerAdsRef;
        }
        return $user->sellerAdsRef;
    }

    public function getUserDataFromId($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function acceptRequest($id, $userId)
    {
        $user = Auth::user();
        $user_type = $user->type;
        $user->points = (int)$user->points + 1;
        $user->save();
        if ($user_type === "Consumer") {
            $buyer = User::find($userId);
            $buyer->points = (int)$buyer->points + 1;
            $buyer->save();
            $ad = ConsumerRef::where('ad_id', $id)->where('user_id', $userId)->where('seller_id', $user->id);
            $ad->delete();
            return response()->json(['status'=>true]);
        }
        $buyer = User::find($userId);
        $buyer->points = (int)$buyer->points + 1;
        $buyer->save();
        $ad = SellerRef::where('ad_id', $id)->where('user_id', $userId)->where('seller_id', $user->id);
        $ad->delete();
        return response()->json(['status'=>true]);
    }

    public function cancelRequest($id, $userId)
    {
        $user = Auth::user();
        $user_type = $user->type;
        if ($user_type === "Consumer") {
            $ad = ConsumerRef::where('ad_id', $id)->where('user_id', $userId)->where('seller_id', $user->id);
            $ad->delete();
            return response()->json(['status'=>true]);
        }
        $ad = SellerRef::where('ad_id', $id)->where('user_id', $userId)->where('seller_id', $user->id);
        $ad->delete();
        return response()->json(['status'=>true]);
    }
}
