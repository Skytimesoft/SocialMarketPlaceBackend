<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\ReferralEarn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ApiResponseHelpers;

    public function createUser(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string|max:191',
                    'email' => 'required|string|email|unique:users,email',
                    'password' => 'required|string|confirmed|min:8|max:191',
                    'user_type' => 'required|string|in:Buyer,Seller'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $referral_user = null;

            if ($request->referral) {
                $referral_user = User::where('referral_one', $request->referral)
                                    ->orWhere('referral_two', $request->referral)
                                    ->first();
                if (!$referral_user) {
                    return response()->json([
                        'message' => 'Invalid referral code',
                        'data' => $referral_user
                    ]);
                }
            }

            // return response()->json([
            //     'message' => 'pass',
            //     'data' => $request->referral
            // ]);

            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $code1 = $user->id.rand(1000000,9999999);
            $code2 = base64_encode($user->id.rand(1000000,9999999));
            $user->update([
                'referral_one' => $code1,
                'referral_two' => $code2,
                'by_referral' => $referral_user->id,
            ]);

            if ($referral_user) {
                ReferralEarn::create([
                    'amount' => 20,
                    'user_id' => $referral_user->id,
                ]);
            }

            // 'referral_one' => $request->referral_one,

            $user->assignRole($request->user_type);
            DB::commit();
            return response()->json([
                'message' => 'User Created Successfully',
                'data' => [
                    'access_token' => $user->createToken("API TOKEN")->plainTextToken,
                    'user' => new UserResource($user),
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'message' => 'User Logged In Successfully',
                'data' => [
                    'access_token' => $user->createToken("API TOKEN")->plainTextToken,
                    'user' => new UserResource($user),
                ]
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Sign out
     */
    public function signOut()
    {
        auth()->user()->tokens()->delete();

        return $this->apiResponse([
            'message' => 'Signed out successfully.'
        ]);
    }
}