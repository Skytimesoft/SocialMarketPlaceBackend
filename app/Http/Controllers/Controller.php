<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        // $users = User::all();
        // // dd($users);
        // foreach($users as $key => $value) {
        //     $code1 = $value->id.rand(1000000,9999999);
        //     $code2 = base64_encode($value->id.rand(1000000,9999999));
        //     $value->update([
        //         'referral_one' => $code1,
        //         'referral_two' => $code2,
        //     ]);
        // }
    }
}
