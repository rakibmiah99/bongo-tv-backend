<?php

namespace App\Models;

use App\Observers\GenericTypeObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#[ObservedBy([GenericTypeObserver::class])]
class GenericType extends Model
{
    use HasFactory;
}
