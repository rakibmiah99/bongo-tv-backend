<?php

namespace App\Models;

use App\Casts\JsonDecodeCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriberPackage extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'description' => JsonDecodeCast::class
    ];
}
