<?php

namespace App\Http\Controllers\Etp;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class EmployeeController extends Controller
{

    /**
     * authenticatin part start
     */
    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'username' => ['required', 'unique:employees'],
            'password' => ['required', 'min:8']    
        ]);
        $employee = new Employee;
        $employee->business_account_id = $request->business_account_id;
        $employee->username = $request->username;
        $employee->password = Hash::make($request->password);
        $employee->save();
        return response()->json([
            'success' => true
        ]);
    }
    
    public function login()
    {
        $credentials = request(['username', 'password']);
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
        //
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
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
