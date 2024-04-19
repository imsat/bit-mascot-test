<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'address',
        'phone',
        'dob',
        'nid',
    ];

    /**
     * Get the user's nid.
     */
    protected function nid(): Attribute
    {
        return Attribute::make(
            get: fn ($nid) => $nid ?  asset('storage'.  $nid)  : 'https://picsum.photos/id/20/575/350',
        );
    }
}
