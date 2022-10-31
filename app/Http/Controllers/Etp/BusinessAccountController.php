<?php

namespace App\Http\Controllers\Etp;

use App\Http\Controllers\Controller;
use App\Models\BusinessAccount;
use App\Models\BusinessCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class BusinessAccountController extends Controller
{


    /**
     * authenticatin part start
     */
    public function register(Request $request)
    {
        
        $validatedData = $request->validate([
            'email' => ['required', 'unique:business_accounts', 'email'],
            'password' => ['required', 'min:8'],
            'name' => ['required'],
            'title' => ['required'],
            'mobile_one' => ['required', 'unique:business_accounts'],
            'address' => ['required'],
            'business_category_id' => ['required']
        ]);
        $account = new BusinessAccount;
        $account->business_category_id = $request->business_category_id;
        $account->email = $request->email;
        $account->name = $request->name;
        $account->password = Hash::make($request->password);
        $account->website = $request->website;
        $account->profile_picture = $request->profile_picture;
        $account->title = $request->title;
        $account->description = $request->description;
        $account->mobile_one = $request->mobile_one;
        $account->mobile_two = $request->mobile_two;
        $account->fix = $request->fix;
        $account->address = $request->address;
        $account->latitude = $request->latitude;
        $account->longitude = $request->longitude;
        $account->save();
        return $this->login($request);
    }
    
    public function login()
    {
        $credentials = request(['email', 'password']);
        $myTTL = 60; // 60*24*365*10 --> 10 years
        JWTAuth::factory()->setTTL($myTTL);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    
    public function me()
    {
        return response()->json(auth()->user());
    }

    
    public function logout(Request $request)
    {
        /*auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);*/
        
        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    /**
     * authentication part end
     */




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offres = BusinessAccount::orderBy('id', 'asc')
        ->select(
            'name','email','website', 'profile_picture',
            'title', 'description', 'mobile_one', 'mobile_two', 'fix',
            'address'
             )
        ->withCount('appointments')
        ->paginate(5);
        return response()->json([
            $offres
        ]);
    }

    public function offresCheck(Request $request)
    {
        if ($request->category_id == 0) {
            return  $this->index();
        }else{
            $category = BusinessCategory::find($request->category_id);
            $offres = $category->businessAccounts()
            ->orderBy('id', 'asc')
            ->select(
                'name','email','website', 'profile_picture',
                'title', 'description', 'mobile_one', 'mobile_two', 'fix',
                'address'
            )
            ->withCount('appointments')
            ->paginate(5);
            return [$offres];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessAccount  $businessAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessAccount $businessAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessAccount  $businessAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessAccount $businessAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessAccount  $businessAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessAccount $businessAccount)
    {
        //
    }
}
