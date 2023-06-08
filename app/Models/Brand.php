<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\InteractsWithMedia;

class Brand extends Model
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'slug', 'url'];

    protected $appends = ['logo'];

    public function goods(): HasMany
    {
        return $this->hasMany(Good::class);
    }

//    protected function logo(): Attribute
//    {
//        return Attribute::get(fn () => $this->hasMedia('brands') ? $this->getFirstMediaUrl('brands') : url('static/not-found.svg'));
//    }
}