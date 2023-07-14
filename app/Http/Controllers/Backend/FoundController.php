<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Found;
use Illuminate\Http\Request;

class FoundController extends Controller
{
    public function getFundHistory() {
        $founds = Found::with(['user'])->orderBy('created_at', 'DESC')->get();
        return $founds ? $founds : [];
    }
    public function addFundToken(Request $request) {
        // $token = time().rand(1000,9999);
        // session()->put($token, [
        //     'user_id' => auth()->id(),
        //     'amount' => $request->amount,
        // ]);
        // return response([
        //     'token' => $token,
        // ]);
        Found::create([
            'user_id' => auth()->id(),
            'wallet_id' => null,
            'amount' => $request->amount,
            'type' => null,
            'cost' => $request->amount,
            'balance' => $request->amount,
        ]);
        return response([
            'message' => 'Fund added successfully'
        ]);
    }
}
