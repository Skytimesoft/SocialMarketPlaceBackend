<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'key', 'value'];

    public static function createLangMeta(User $user)
    {
        return UserMeta::create([
            'user_id' => $user->id,
            'key' => 'lang',
            'value' => 'en',
        ]);
    }
}