<?php

namespace App\Http\Controllers\Api;

use App\Models\UserMeta;
use Illuminate\Http\Request;
use F9Web\ApiResponseHelpers;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class ProfileController extends Controller
{
    use ApiResponseHelpers;

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return new UserResource(auth()->user());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $validatedData = $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validatedData);

        return $this->apiResponse([
            'message' => 'Profile updated successfully!'
        ]);
    }

    public function currentLanguage()
    {
        $user = auth()->user();
        $langMeta = UserMeta::where('user_id', $user->id)->where('key', 'lang')->first();

        if (!isset($langMeta)) {
            $langMeta = UserMeta::createLangMeta($user);
        }

        return $this->apiResponse([
            'data' => [
                'current_language' => $langMeta->value
            ]
        ]);
    }

    public function updateLanguage(Request $request)
    {
        $this->validate($request, [
            'language' => 'required|string'
        ]);

        $user = auth()->user();
        $langMeta = UserMeta::where('user_id', $user->id)->where('key', 'lang')->first();

        if (!isset($langMeta)) {
            $langMeta = UserMeta::createLangMeta($user);
        }

        $langMeta->update(['value' => $request->language]);

        return $this->apiResponse([
            'message' => 'Language updated successfully.',
            'data' => [
                'current_language' => $langMeta->value
            ]
        ]);
    }
}