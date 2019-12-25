<?php
namespace App\Http\Controllers\Auth;
use App\User;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
                  'name' => 'required',
                  'password' => 'required|min:6',
                  'email' => 'required|email|unique:users',
                  'c_password' => 'required|same:password',
                  'phone'       => 'required',
                  'type'       => 'required'
        ]);
        if ($validator->fails()) {
           return response()->json(['error'=>$validator->errors()], 401);
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);

        $image = $request->image;
        if ($image == null) {
          $png_url = 'user.png';
          $user->image = $png_url;
          $user->save();
          $success['token'] =  $user->createToken('AppName')->accessToken;
          return response()->json(['status'=>true,'success'=>$success,'msg'=>'Register Successful'], 200);
        }else{
          $image = substr($image, strpos($image, ",")+1);
          $data = base64_decode($image);
          $png_url = "user-".time().".png";
          $path = public_path().'/img/users/' . $png_url;
          $user->image = $png_url;
          $user->save();
          file_put_contents($path, $data);
          $success['token'] =  $user->createToken('Personal Access Token')->accessToken;
          return response()->json(['status'=>true,'success'=>$success,'msg'=>'Register Successful'], 200);
        }
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        $countryCode = PhoneNumber::make($request->mobile)->getCountry();
        $validator = Validator::make($request->all(), [
                  'name' => 'required',
                  'email' => 'nullable|email|unique:users,email,' . $id,
                  // 'mobile' => 'required|regex:/(01)[0-9]{9}/',
                  'mobile' => 'min:8',
                  'mobile'       => 'phone:'.$countryCode
                  // 'socialLink' => 'required'
        ]);
        if ($validator->fails()) {
           return response()->json(['error'=>$validator->errors()], 401);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->mobile = PhoneNumber::make($request->mobile, $countryCode);
        $user->desc = $request->desc;
        $user->company = $request->company;
        $user->socialLink = $request->socialLink;
        $user->isPublic = $request->isPublic;
        // if($request->has('image')) {
        // $user->save();
        $image = $request->image;
        if ($image == null) {
          $png_url = 'user.svg';
          $user->image = $png_url;
          $user->save();
        }
        else{
          $image = substr($image, strpos($image, ",")+1);
          $data = base64_decode($image);
          $png_url = "user-".time().".png";
          $path = public_path().'/img/users/' . $png_url;
          $user->image = $png_url;
          $user->save();
          file_put_contents($path, $data);
        }
        return response()->json($user);
    }
}
