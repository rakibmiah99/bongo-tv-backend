<?php

namespace App\Models;

use App\Observers\SubCategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#[ObservedBy([SubCategoryObserver::class])]
class SubCategory extends Model
{
    use HasFactory;
}
