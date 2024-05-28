<?php

namespace App\Models;

use App\Models\Scopes\OrderingScope;
use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([CategoryObserver::class]), ScopedBy(OrderingScope::class)]
class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function scopeVisible(Builder $builder){
        $builder->where('visibility', true);
    }

    public function sub_categories(){
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

    public function slider_movies() {
        return $this->hasManyThrough(
            Movie::class,
            CategorySlider::class,
            'category_id',
            'id'
        )->orderBy('category_sliders.ordering', 'ASC');
    }
}
