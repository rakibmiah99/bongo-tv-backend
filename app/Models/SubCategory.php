<?php

namespace App\Models;

use App\Models\Scopes\OrderingScope;
use App\Observers\SubCategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([SubCategoryObserver::class]), ScopedBy([OrderingScope::class])]
class SubCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function movies(){
        return $this->hasMany(MoviesCategory::class, 'sub_category_id', 'id');
    }

    public function sub_categories_movies(){
        return $this->hasManyThrough(
            Movie::class,
            MoviesCategory::class,
            'sub_category_id',
            'id',
            'id',
            'movie_id'
        );
    }

}
